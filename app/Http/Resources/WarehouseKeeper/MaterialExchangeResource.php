<?php

namespace App\Http\Resources\WarehouseKeeper;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialExchangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'project' => $this->work->construction->piece->pattern->project->name,
            'pattern' => $this->work->construction->piece->pattern->name,
            'piece' => $this->work->construction->piece->name,
            'construction' => $this->work->construction->name,
            'floor' => $this->work->floorName->name,
            'work' => $this->work->workType->name,
            'material-exchange-workers' => $this->materialExchangeWorkers->isNotEmpty() ? true : false,
        ];
    }
}
