<?php

namespace App\Actions;

use App\Services\Auth\AuthService;

class LoginAction
{


    public function __construct(
        protected AuthService $authService
    ) {}

    public function execute(array $credentials): array
    {
        $token = $this->authService->login($credentials);
        $user = auth()->user();

        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'user'         => [
                'id'     => $user->id,
                'name'   => $user->name,
                'email'  => $user->email,
                'status' => $user->status,
                'role'   => $user->role?->name,
            ]
        ];
    }
}