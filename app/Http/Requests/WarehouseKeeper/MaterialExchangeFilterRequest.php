<?php

namespace App\Http\Requests\WarehouseKeeper;

use App\Http\Requests\BaseRequest;

class MaterialExchangeFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'supervisor_id' => 'required|integer|exists:supervisors,id',
            'created_at' => 'required|date_format:Y-m-d',
        ];
    }

}
