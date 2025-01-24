<?php

namespace App\Http\Requests\WarehouseKeeper;

use App\Http\Requests\BaseRequest;

class MaterialExchangeExportRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'supervisor_id' => 'required|integer|exists:supervisors,id',
            'created_at' => 'required|date_format:Y-m-d',
            'format' => 'required|in:xlsx,pdf',
            'with_workers' => 'required|boolean',
        ];
    }

}
