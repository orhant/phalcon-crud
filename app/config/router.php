<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/user', 'User::index', ['GET']);
$router->add('/user/add','User::add', ['GET', 'POST']);
$router->add('/user/edit/{id}','User::edit', ['GET', 'POST']);

$router->handle($_SERVER['REQUEST_URI']);
