<?php

namespace App\Services\Supervisor;

use App\Models\Worker;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class WorkerService extends BaseService
{
    public function __construct(Worker $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {
        $today = today()->format('d');

        $workers = Worker::query()->select('workers.*', DB::raw("
                CASE
                    WHEN EXISTS (
                        SELECT 1
                        FROM material_exchange_workers
                        WHERE workers.id = material_exchange_workers.worker_id
                          AND DAY(material_exchange_workers.created_at) = {$today}
                          AND material_exchange_workers.duration = 'half_day'
                        GROUP BY worker_id
                        HAVING COUNT(*) = 1
                    ) THEN 'half_day'
                    ELSE 'day'
                END AS availability
            "))
            ->whereExists(function ($query) use ($today){
                $query->select(DB::raw(1))
                    ->from('worker_hours')
                    ->whereDay('date', $today)
                    ->whereColumn('workers.id', 'worker_hours.worker_id');
            })
            ->whereNotExists(function ($query) use ($today){
                $query->select(DB::raw(1))
                    ->from('material_exchange_workers')
                    ->whereColumn('workers.id', 'material_exchange_workers.worker_id')
                    ->whereDay('created_at', $today)
                    ->where('duration', 'day');
            })
            ->whereNotExists(function ($query) use ($today){
                $query->select(DB::raw(1))
                    ->from('material_exchange_workers')
                    ->whereColumn('workers.id', 'material_exchange_workers.worker_id')
                    ->whereDay('created_at', $today)
                    ->where('duration', 'half_day')
                    ->groupBy('worker_id')
                    ->having(DB::raw('COUNT(*)'), '=', 2);
            })
            ->get();

        return $workers;
    }


}
