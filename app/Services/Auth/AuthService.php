<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enums\RoleEnum;

class AuthService
{


    public function login(array $credentials): string
    {
        if (! $token = Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password.'],
            ]);
        }

        return $token;
    }


    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * Refresh JWT token.
     */
    public function refresh(): string
    {
        return Auth::refresh();
    }


    public function signup(array $data): User
    {
        return User::create(
            [
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }

    /**
     * Get the authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function me()
    {
        return Auth::user();
    }
}
