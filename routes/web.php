<?php

/** @var \Laravel\Lumen\Routing\Router $router */


use App\Http\Controllers\SubscriptionController;


$router->post('/subscribe/{partnerId}', 'SubscriptionController@subscribe');

$router->delete('/subscribe/{partnerId}', 'SubscriptionController@unsubscribe');

$router->post('/subscribe/{partnerId}/callback', 'SubscriptionController@unsubscribe');

