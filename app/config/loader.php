<?php

$loader = new \Phalcon\Loader();

// var_dump($config->application->modelsDir);
/**
 * We're a registering a set of directories taken from the configuration file
 */
// $loader->registerDirs(
$loader->registerNamespaces(
    [
        // $config->application->controllersDir,
        // $config->application->modelsDir,
        'app\controllers'   =>  $config->application->controllersDir,
        'app\models'    =>  $config->application->modelsDir,
        // 'MyApp'             => 'app/library',
        // 'MyApp\Controllers\UserController' => 'app/controllers/UserController.php',
        // 'MyApp\Models\User'      => 'app/models/User.php',
    ]
)->register();
