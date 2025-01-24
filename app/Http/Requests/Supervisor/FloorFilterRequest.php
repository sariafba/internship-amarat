<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class FloorFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'construction_id' => 'required|integer|exists:constructions,id',
        ];
    }

}
