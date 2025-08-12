<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Actions\LoginAction;
use App\Actions\SignUpAction;
use App\Services\Auth\AuthService;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Auth\SignupRequest;


class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(
        protected LoginAction $loginAction,
        protected SignUpAction $signUpAction,
        protected AuthService $authService
    ) {}


    public function signIn(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        return sendResponse(
            $this->loginAction->execute($credentials),
            200,
            'Authenticated!'
        );
    }


    public function signup(SignupRequest $request): JsonResponse
    {
        $user = $this->signUpAction->execute($request->validated());

        return sendResponse(
            $user,
            201,
            'Account created!',
            true
        );
    }


    public function logout()
    {
        return $this->authService->logout();
    }

    public function me()
    {
        $authUser = $this->authService->me();
        return  sendResponse(
            $authUser,
            200,
            'User retrieved successfully.'
        );
    }
}
