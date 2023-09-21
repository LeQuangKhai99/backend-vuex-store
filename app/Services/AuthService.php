<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

class AuthService {
  protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function login($request) {
        $user = $this->userService->getByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return abort(401, 'Invalid credentials.');
        }

        return $user;
    }
}