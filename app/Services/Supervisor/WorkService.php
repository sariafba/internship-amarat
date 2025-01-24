<?php

namespace App\Services\Supervisor;

use App\Http\Resources\Supervisor\WorkResource;
use App\Models\Work;
use App\Services\BaseService;

class WorkService extends BaseService
{
    public function __construct(Work $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {
        $data = $this->model::query();

        foreach ($filters as $key => $value)
            $data = $data->where($key, $value);

        $data = $data->with(['workType'])->get();

        return WorkResource::collection($data);
    }
}
