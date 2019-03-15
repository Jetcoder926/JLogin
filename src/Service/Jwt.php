<?php

namespace Jetcoder\JLogin\Service;


use Illuminate\Http\Request;
use Jetcoder\JLogin\Contracts\Token;

class Jwt implements Token
{

    protected $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function userInfo()
    {
        try {
            $user = auth('api')->user();
        }catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return false;
        }

        return $user;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function hasToken(Request $request):bool
    {
        return auth('api')->parser()->setRequest($request)->hasToken();
    }

    /**
     * @return bool
     */
    public function TokenExp():bool
    {
        return auth('api')->check();
    }

    public function getClaim()
    {
        return auth('api')->payload()->toArray();
    }


    public function getToken($credentials,$exp = '')
    {
        return $this->respondWithToken(auth('api')->setTTL($exp?:config('jlogin.token.expire'))->attempt($credentials));
    }

    public function destroyToken()
    {
        return auth('api')->logout(true);
    }

    public function refreshToken()
    {
        return $this->respondWithToken(auth('api')->refresh(true,true));
    }


    public function validateToken($credentials)
    {
        if (!auth('api')->validate($credentials))  return false;
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL()
        ];
    }
}