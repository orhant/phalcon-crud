<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        // 'app/controllers',
        // 'app/models'
        // 'MyApp'             => 'app/library',
        // 'MyApp\Controllers\UserController' => 'app/controllers/UserController.php',
        // 'MyApp\Models\User'      => 'app/models/User.php',
    ]
)->register();
