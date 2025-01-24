<?php

namespace App\Services\Supervisor;

use App\Exceptions\NotFoundException;
use App\Http\Resources\Supervisor\MaterialExchangeResource;
use App\Models\MaterialExchange;
use App\Services\BaseService;

class MaterialExchangeService extends BaseService
{
    public function __construct(MaterialExchange $model)
    {
        $this->model = $model;
        $this->supervisor = auth('supervisor')->user();
    }

    public function getAll($filters = [])
    {
        $data = $this->supervisor->materials()
            ->whereDay('created_at', today())
            ->with([
            'work.workType',
            'work.floorName',
            'work.construction',
            'work.construction.piece',
            'work.construction.piece.pattern',
            'work.construction.piece.pattern.project',
            'materialExchangeWorkers'
        ])->get();

        return MaterialExchangeResource::collection($data);
    }

    public function create($data)
    {
        $data['supervisor_id'] = $this->supervisor->id;

        $data = parent::create($data);

        return new MaterialExchangeResource($data);
    }

    public function update($id, $data)
    {
        $material = $this->supervisor->materials()->find($id);

        if (!$material)
            throw new NotFoundException();

        $material->update($data);

        return new MaterialExchangeResource($material);
    }


}
