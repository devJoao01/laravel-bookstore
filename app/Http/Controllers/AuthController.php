<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login(AuthRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
