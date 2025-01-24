<?php

namespace App\Http\Requests\Supervisor;

use App\Http\Requests\BaseRequest;

class SupervisorLoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }

}
