<?php

namespace App\Services\WarehouseKeeper;

use App\Http\Resources\Supervisor\MaterialExchangeWorkerResource;
use App\Models\MaterialExchangeWorker;
use App\Services\BaseService;

class MaterialExchangeWorkerService extends BaseService
{
    public function __construct(MaterialExchangeWorker $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {
        $data = $this->model::query();

        foreach ($filters as $key => $value)
            $data = $data->where($key, $value);

        $data = $data->with('worker')->get();

        return MaterialExchangeWorkerResource::collection($data);
    }


}
