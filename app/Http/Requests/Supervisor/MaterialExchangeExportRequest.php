<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class MaterialExchangeExportRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'format' => 'required|in:xlsx,pdf'
        ];
    }

}
