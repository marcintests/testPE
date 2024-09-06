<?php

namespace App\Services\Factory;

use App\Services\Facade\Login;

class LoginFactory
{
    public function login(Login $loginService, string $login, string $password): bool
    {
        if ($loginService->login($login, $password)) {
             return true;
        }

        return false;
    }
}
