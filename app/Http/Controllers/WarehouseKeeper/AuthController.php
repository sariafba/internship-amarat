<?php

namespace App\Http\Controllers\WarehouseKeeper;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseKeeper\WarehouseKeeperLoginRequest;
use App\Services\WarehouseKeeper\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(WarehouseKeeperLoginRequest $request)
    {
        $data = $request->validated();

        $res = $this->authService->login($data);

        return $this->sendResponse(message:__('custom.login_success'), data:$res);
    }

    public function logout()
    {
        $res = $this->authService->logout();

        return $this->sendResponse(message:__('custom.logout_success'), data:$res);
    }
}
