<?php

namespace App\Actions;

use App\Services\Auth\AuthService;
use App\Services\Auth\RoleService;
use App\Enums\RoleEnum;
use App\Models\User;


class SignUpAction
{

    public function __construct(
        protected AuthService $authService,
        protected RoleService $roleService
    ) {}


    public function execute(array $data): User
    {
        $user = $this->authService->signup($data);

        $this->roleService->assignRole($user, RoleEnum::User->value);
        return $user;
    }
}