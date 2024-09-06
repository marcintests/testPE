<?php

namespace App\Http\Controllers;

use App\Services\Facade\BarLoginFacade;
use App\Services\Facade\BazLoginFacade;
use App\Services\Facade\FooLoginFacade;
use App\Services\Facade\Login;
use App\Services\Factory\LoginFactory;
use App\Services\Jwt;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function login(
        Request $request,
        Jwt $jwt
    ): JsonResponse {
        $requestContent = json_decode($request->getContent());

        if (
            empty($requestContent)
            || !isset($requestContent->login)
            || !isset($requestContent->password)
        ) {
            return response()->json([
                'status' => 'failure',
            ], 401);
        }

        $login = $requestContent->login;
        $password = $requestContent->password;
        $loginPrefix = substr($login, 0, 4);

        $loginService = match ($loginPrefix) {
            'BAR_' => new BarLoginFacade(),
            'BAZ_' => new BazLoginFacade(),
            'FOO_' => new FooLoginFacade(),
            default => null
        };

        if(!$loginService instanceof Login) {
            return response()->json([
                'status' => 'failure',
            ], 401);
        }

        $loginFactory = new LoginFactory();
        if ($loginFactory->login($loginService, $login, $password)) {
            return response()->json([
                'status' => 'success',
                'token' => $jwt->generateSimpleJWTToken(
                    $login,
                    substr($loginPrefix, 0, 3)
                ),
            ]);
        };

        return response()->json([
            'status' => 'failure',
        ], 401);
    }
}
