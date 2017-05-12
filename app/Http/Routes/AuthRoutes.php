<?php

namespace App\Http\Routes;

class AuthRoutes
{
    public function map()
    {
        $api = app('Dingo\Api\Routing\Router');
        $api->version(env('API_VERSION'), function ($api) {
            $api->group(['namespace' => 'App\Http\Controllers\Api\Internal'], function ($api) {
                $api->group(['namespace' => 'Auth'], function ($api) {
                    $api->group(['prefix' => 'auth'], function ($api) {
                        $api->post('login', 'AuthController@login');                        // 用户登录的基本信息
                        $api->get('role',['middleware'=>[],'uses'=>'RoleController@roleList']);
                    });

                });
            });
        });
    }
}