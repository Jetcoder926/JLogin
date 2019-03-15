<?php

return [

        'TokenService' => env('JLoginTokenService','jwt'),

        'SocialiteDriver'=>env('JLoginSocialiteDriver','github'),

        'token'=>[
            'expire'=> 2 //分钟
        ]
];