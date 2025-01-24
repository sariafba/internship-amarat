<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class MaterialExchangeWorkerStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'material_exchange_id' => 'required|integer',
            'workers' => 'required|array',
            'workers.*.id' => 'required|integer|min:1',
            'workers.*.duration' => 'required|string|in:day,half_day',
        ];
    }

}
