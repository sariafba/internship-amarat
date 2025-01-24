<?php

namespace App\Http\Requests\WarehouseKeeper;

use App\Http\Requests\BaseRequest;

class MaterialExchangeWorkerFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'material_exchange_id' => 'required|integer|exists:material_exchanges,id',
            'duration' => 'nullable|in:day,half_day'
        ];
    }

}
