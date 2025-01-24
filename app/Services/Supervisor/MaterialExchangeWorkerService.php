<?php

namespace App\Services\Supervisor;

use App\Exceptions\CustomExceptionWithMessage;
use App\Exceptions\NotFoundException;
use App\Http\Resources\Supervisor\MaterialExchangeWorkerResource;
use App\Models\MaterialExchangeWorker;
use App\Models\Worker;
use App\Services\BaseService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Sleep;

class MaterialExchangeWorkerService extends BaseService
{
    public function __construct(MaterialExchangeWorker $model)
    {
        $this->model = $model;
        $this->supervisor = auth('supervisor')->user();
    }

    public function getAll($filters = [])
    {
        $data = $this->supervisor
            ->materials()
            ->whereDay('created_at', today())
            ->with('materialExchangeWorkers.worker')
            ->find($filters['material_exchange_id']);

        if(!$data)
            throw new NotFoundException();

        return MaterialExchangeWorkerResource::collection($data->materialExchangeWorkers);
    }

    public function create($data)
    {
        try {
            DB::beginTransaction();

            $materialExchange = $this->supervisor
                ->materials()
                ->whereDay('created_at', today())
                ->with('materialExchangeWorkers.worker')
                ->find($data['material_exchange_id']);

            if(!$materialExchange)
                throw new NotFoundException();

            Cache::lock('workers')->block(10, function () use ($materialExchange, $data) {

            $activeWorkers = (new WorkerService(new Worker()))->getAll()->keyBy('id');

            $newWorkers = $this->updateExistsWorkers($materialExchange->materialExchangeWorkers, $activeWorkers, $data['workers']);

            $this->isWorkersActive($newWorkers, $activeWorkers);

            DB::table('material_exchange_workers')->insert($this->createMaterialExchangeWorkerArray($newWorkers, $materialExchange->id));

            });

            DB::commit();

            return MaterialExchangeWorkerResource::collection($this->getAll(['material_exchange_id' => $materialExchange->id]));
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        $worker = $this->supervisor
            ->materials()
            ->whereDay('created_at', today())
            ->whereHas('materialExchangeWorkers', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->with(['materialExchangeWorkers' => function ($query) use ($id) {
                $query->where('id', $id);
            }])
            ->get()
            ->pluck('materialExchangeWorkers')
            ->flatten()
            ->first();

        if (!$worker) {
            throw new NotFoundException();
        }

        // Delete the worker if found
        return $worker->delete();
    }


    private function updateExistsWorkers($existsWorkers, $activeWorkers, $newWorkers)
    {
        $newWorkers = collect($newWorkers)->keyBy('id');
        foreach($existsWorkers as $existsWorker)
        {
            $worker = $newWorkers->get($existsWorker->worker->id);

            if($worker)
            {
                if($existsWorker->duration === $worker['duration'])
                    $newWorkers->forget($worker['id']);

                elseif ($existsWorker->duration === 'half_day' && $worker['duration'] === 'day')
                {
                    if($activeWorkers->get($worker['id']))
                    {
                        $existsWorker->update(['duration' => 'day']);
                        $newWorkers->forget($worker['id']);
                    }
                    else
                        throw new CustomExceptionWithMessage('worker ' . $worker['id'] . ' not active for ' . $worker['duration']);
                }

                elseif ($existsWorker->duration === 'day' && $worker['duration'] === 'half_day')
                {
                    $existsWorker->update(['duration' => 'half_day']);
                    $newWorkers->forget($worker['id']);
                }
            }
        }
        return $newWorkers;
    }

    private function isWorkersActive($newWorkers, $activeWorkers)
    {
        foreach ($newWorkers as $worker)
        {
            $activeWorker = $activeWorkers->get($worker['id']);

            if (!$activeWorker)
                throw new CustomExceptionWithMessage('العامل غير متاح');

            if ($worker['duration'] === 'day' && $activeWorker['availability'] === 'half_day')
                throw new CustomExceptionWithMessage('worker ' . $worker['id'] . ' not active for ' . $worker['duration']);
        }
    }

    private function createMaterialExchangeWorkerArray($newWorkers, $id)
    {
        $array = [];

        foreach ($newWorkers as $worker)
        {
            $array[] = [
                'material_exchange_id' => $id,
                'worker_id' => $worker['id'],
                'duration' => $worker['duration'],
                'created_at' => now(),
            ];
        }
        return $array;
    }
}
