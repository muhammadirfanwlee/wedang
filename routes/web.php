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




$router->group(['middleware' => 'basicAuth'], function () use ($router) {
    $router->get('/barang', 'ControllerBarang@index');
    $router->post('/barang', 'ControllerBarang@create');
    $router->get('/detail/{id}', 'ControllerBarang@detail');
    $router->put('/update/{id}', 'ControllerBarang@update');
    $router->delete('/delete/{id}', 'ControllerBarang@delete');

    $router->get('/transaksi', 'ControllerTransaksi@index');
    $router->post('/transaksi', 'ControllerTransaksi@create');
    $router->get('/transaksi/detail/{id}', 'ControllerTransaksi@detail');
    $router->put('/transaksi/update/{id}', 'ControllerTransaksi@update');
    $router->delete('/transaksi/delete/{id}', 'ControllerTransaksi@delete');
});
