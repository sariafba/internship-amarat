<?php

namespace App\Http\Requests\WarehouseKeeper;

use App\Http\Requests\BaseRequest;

class WarehouseKeeperLoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }


}
