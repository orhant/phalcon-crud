<?php

use Phalcon\Mvc\Dispatcher;

$router = $di->getRouter();

$di->set(
    'dispatcher',
    function () {
        $dispatcher = new Dispatcher();

        $dispatcher->setDefaultNamespace(
            'app\controllers'
        );

        return $dispatcher;
    }
);
// Define your routes here
$router->add('/user', 'User::index');
$router->add('/user/add', 'User::add');
$router->add('/user/edit/{id}', 'User::edit');
$router->add('/user/delete/{id}', 'User::delete');

$router->add('/user/pelatihan', 'User::pelatihan');

$router->handle($_SERVER['REQUEST_URI']);
