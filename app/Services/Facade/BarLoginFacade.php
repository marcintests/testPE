<?php

namespace App\Services\Facade;

use App\Exceptions\AuthenticationFailedException;
use External\Bar\Auth\LoginService;

class BarLoginFacade implements Login
{
    public function login(string $login, string $password): bool
    {
        if (!(new LoginService())->login($login, $password)) {
             return false;
        }

        return true;
    }
}
