<?php

namespace App\Services\Supervisor;

use App\Http\Resources\Supervisor\FloorNameResource;
use App\Models\Construction;
use App\Models\Floor;
use App\Models\FloorName;
use App\Services\BaseService;

class FloorNameService extends BaseService
{
    public function __construct(FloorName $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {
        $construction = Construction::query()->find($filters['construction_id']);

        return FloorNameResource::collection($construction->floorsName);
    }


}
