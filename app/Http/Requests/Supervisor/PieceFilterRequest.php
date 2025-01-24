<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class PieceFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'pattern_id' => 'required|integer|exists:patterns,id',
        ];
    }

}
