<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request) {      
        $user = $this->authService->login($request);

        return Response::json(new LoginResource($user));
    }
}
