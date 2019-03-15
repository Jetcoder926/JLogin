<?php

namespace Jetcoder\JLogin\Contracts;
interface Socialite
{

    public function authorize();


    public function getUser();
}