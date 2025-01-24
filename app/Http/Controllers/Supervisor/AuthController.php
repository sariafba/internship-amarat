<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supervisor\SupervisorLoginRequest;
use App\Services\Supervisor\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(SupervisorLoginRequest $request)
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
