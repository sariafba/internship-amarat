<?php

namespace App\Services\Supervisor;

use App\Http\Resources\Supervisor\SupervisorResource;
use App\Models\Supervisor;
use App\Services\BaseAuthService;

class AuthService extends BaseAuthService
{
    public function __construct(Supervisor $model)
    {
        $this->model = $model;
        $this->resource = SupervisorResource::class;
    }

    public function logout()
    {
        auth('supervisor')->user()->currentAccessToken()->delete();

        return true;
    }
}
