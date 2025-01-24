<?php

namespace App\Services\WarehouseKeeper;

use App\Http\Resources\WarehouseKeeper\WarehouseKeeperResource;
use App\Models\WarehouseKeeper;
use App\Services\BaseAuthService;

class AuthService extends BaseAuthService
{
    public function __construct(WarehouseKeeper $model)
    {
        $this->model = $model;
        $this->resource = WarehouseKeeperResource::class;
    }

    public function logout()
    {
        auth('warehouseKeeper')->user()->currentAccessToken()->delete();

        return true;
    }
}
