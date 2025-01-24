<?php

namespace App\Services;

use App\Exceptions\CustomExceptionWithMessage;
use Illuminate\Support\Facades\Hash;

class BaseAuthService
{
    protected $model;
    protected $resource;

    public function login($data)
    {
        $model = $this->model::query()->where('username', $data['username'])->first();

        if(!$model)
            throw new CustomExceptionWithMessage('username not found');

        if(!Hash::check ($data['password'], $model->password))
            throw new CustomExceptionWithMessage('wrong password');

        $token = $model->createToken('AUTH')->plainTextToken;

        return [
            'user' => new $this->resource($model),
            'token' => $token
        ];
    }

    public function logout() {}
}
