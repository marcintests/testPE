<?php

namespace App\Services;

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
