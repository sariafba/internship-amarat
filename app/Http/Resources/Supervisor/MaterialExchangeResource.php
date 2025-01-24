<?php

namespace App\Http\Resources\Supervisor;

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
            'project' => [
                'id' => $this->work->construction->piece->pattern->project->id,
                'name' => $this->work->construction->piece->pattern->project->name,
            ],
            'pattern' => [
                'id' => $this->work->construction->piece->pattern->id,
                'name' => $this->work->construction->piece->pattern->name,
            ],
            'piece' => [
                'id' => $this->work->construction->piece->id,
                'name' => $this->work->construction->piece->name,
            ],
            'construction' => [
                'id' => $this->work->construction->id,
                'name' => $this->work->construction->name,
            ],
            'floor' => [
                'id' => $this->work->floor_id,
                'name' => $this->work->floorName->name,
            ],
            'work' => [
                'id' => $this->work->id,
                'name' => $this->work->workType->name,
            ],
            'material-exchange-workers' => $this->materialExchangeWorkers->isNotEmpty() ? true : false,
        ];
    }
}
