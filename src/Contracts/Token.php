<?php

namespace Jetcoder\JLogin\Contracts;
interface Token
{

        public function userInfo();


        public function getClaim();


        public function destroyToken();


        public function getToken($credentials);


        public function validateToken($credentials);


        public function refreshToken();

}