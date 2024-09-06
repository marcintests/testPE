<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Services\Facade\BarLoginFacade;
use App\Services\Facade\BazLoginFacade;
use App\Services\Facade\FooLoginFacade;
use App\Services\Facade\Login;
use App\Services\Factory\LoginFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class Jwt
{
    public function generateSimpleJWTToken(string $login,string $service): string
    {
        $header = $this->base64_url_encode(json_encode([
            "alg" => "HS512",
            "typ" => "JWT"
        ]));
        $payload = $this->base64_url_encode(json_encode([
            "login" => $login,
            "context" => $service,
            "iat" => 1516239022
        ]));
        $signature = $this->base64_url_encode(hash_hmac(
            'sha512',
            "$header.$payload",
            'secret', //secret from env - e.g. env('JWS_SECRET')
            true
        ));
        return "$header.$payload.$signature";
    }

    private function base64_url_encode($input): string
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }
}
