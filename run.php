<?php

require __DIR__ . '/vendor/autoload.php';

$server = new \Ratchet\App('locahost', '8080', '0.0.0.0');

$config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/config.yml'));

if (is_array($config)) {
    foreach ($config as $app) {
        $server->route('/' . $app['name'], new \App\Pusher($app['pass']), ['*'], $app['host']);
    }
}

$server->run();
