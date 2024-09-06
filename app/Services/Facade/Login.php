<?php

namespace App\Services\Facade;

interface Login
{
    public function login(string $login, string $password): bool;
}
