<?php
namespace Jetcoder\JLogin\Service;

use Jetcoder\JLogin\Contracts\Socialite as BaseSocialite;

class Socialite implements BaseSocialite
{

        protected $config = [];


        public function __construct($config)
        {
            $this->config = $config;
        }

        public function authorize()
        {
            return Socialite::driver($this->config['SocialiteDriver'])->redirect();
        }


        public function getUser()
        {
            return Socialite::driver($this->config['SocialiteDriver'])->user();
        }


}

