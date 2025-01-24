<?php

namespace App\Services\WarehouseKeeper;

use App\Http\Resources\WarehouseKeeper\MaterialExchangeResource;
use App\Models\MaterialExchange;
use App\Services\BaseService;

class MaterialExchangeService extends BaseService
{
    public function __construct(MaterialExchange $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [])
    {
        $data = $this->model->query()
            ->with([
                'work.workType',
                'work.floorName',
                'work.construction',
                'work.construction.piece',
                'work.construction.piece.pattern',
                'work.construction.piece.pattern.project',
                'materialExchangeWorkers.worker'])
            ->where('supervisor_id', $filters['supervisor_id'])
            ->whereDate('created_at', $filters['created_at'])
            ->get();

        return MaterialExchangeResource::collection($data);
    }


}
