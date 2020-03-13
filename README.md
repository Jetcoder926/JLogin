# JLogin


### 使用

1. 创建配置文件 **php artisan vendor:publish --provider="Jetcoder\JLogin\LoginActServiceProvider"**


2. 修改 config/auth 的配置,用户模型可以修改为自己的


        'guards' => [
            'web' => [
         'driver' => 'session',
            'provider' => 'users',
         ],
         'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
            ],
         ],


  
3. 配置jwt,这里不赘述了.官方已经详细说明 https://jwt-auth.readthedocs.io/en/develop/

4. 配置.env文件

### 然后就可以用外观来调用了.其实也就简单再封装一下.待优化的.
&emsp;使用 app('token') 调用jwt  
&emsp;使用 app('socialite')调用laravel-socialite
