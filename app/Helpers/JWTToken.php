<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTToken
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function createToken($userEmail, $userID)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'Laravel-token',
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24 * 30),
            'email' => $userEmail,
            'userID'=> $userID,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function readToken($token)
    {
        try {
            if ($token==null){
                return 'unauthorized';
            } else {
                $key = env('JWT_KEY');
                return JWT::decode($token, new Key($key, 'HS256'));
            }
        } catch (Exception $e) {
            return 'unauthorized';
        }
        
    }
}
