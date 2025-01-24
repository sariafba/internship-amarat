<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class MaterialExchangeWorkerFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'material_exchange_id' => 'required|integer',
        ];
    }

}
