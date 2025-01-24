<?php

namespace App\Http\Resources\Supervisor;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialExchangeWorkerResource extends JsonResource
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
            'duration' => $this->duration,
            'worker' => [
                'id' => $this->worker->id,
                'name' => $this->worker->name,
            ]
        ];
    }
}
