<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class ConstructionFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
          'piece_id' => 'required|integer|exists:pieces,id',
        ];
    }

}
