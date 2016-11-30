<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// PDO
$container['dbh'] = function($container) {

    $config = $container->get('settings')['pdo'];
    $dsn = "{$config['engine']}:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
    $username = $config['username'];
    $password = $config['password'];

    //return new PDO($dsn, $username, $password, $config['options']);
    return new \Slim\PDO\Database($dsn, $username, $password);

};

$container['\Controller'] = function($c) {
    //return new \Controllers\Controllers($c['dbh']);
    return new \Controllers\Controller($c['dbh']);
};