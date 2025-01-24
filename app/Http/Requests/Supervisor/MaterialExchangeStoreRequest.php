<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class MaterialExchangeStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'work_id' => 'required|integer|exists:works,id',
        ];
    }

}
