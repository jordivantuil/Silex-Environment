<?php
    
require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\FormServiceProvider;

$app = new Silex\Application();

include 'providers.php';

$app['debug'] = $app['config']['dev'];

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    
    $loader = new YamlFileLoader(new FileLocator(__DIR__ . '/config'));
    
    $routes->addCollection($loader->load('routing.yml'));

    return $routes;
    
});

$app['db'] = function () use ($app) {
    
    $database = $app['config']['database'];
    
    return new \Medoo\Medoo([
        'database_type' => 'mysql',
        'database_name' => $database['name'],
        'server' => $database['host'],
        'username' => $database['user'],
        'password' => $database['password'],
        'charset' => 'utf8',
        'port' => $database['port'],
    ]);
    
};

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    
});

$app->before(function(Request $request, Application $app) {
    
});

$app->after(function(Request $request, Response $response) use ($app) {
    
});

$app->run();

?>