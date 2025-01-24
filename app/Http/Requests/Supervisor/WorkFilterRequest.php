<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class WorkFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'floor_id' => 'required|integer|exists:floors,id',
        ];
    }
}
