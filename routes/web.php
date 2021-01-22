<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// API route group
$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'user'], function () use ($router) {

        $router->post('register', 'API\AuthController@register');
        $router->post('sign-in', 'API\AuthController@login');
        $router->patch('recover-password', 'API\ChangePasswordController@passwordResetProcess');
        $router->post('recover-password', 'API\PasswordResetController@sendPasswordResetEmail');

        //companies
        $router->group(['prefix' => 'companies'], function () use ($router) {
            $router->group(['middleware' => 'auth'], function () use ($router) {
                $router->get('/', 'API\CompaniesController@index');
                $router->post('/', 'API\CompaniesController@store');
            });
        });

    });
});


