<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class PatternFilterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
          'project_id' => 'required|integer|exists:projects,id',
        ];
    }

}
