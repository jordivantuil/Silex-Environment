<?php
    
$app->register(new Silex\Provider\SessionServiceProvider(), array(
    'session.storage.options' => array(
        'name' => 'session',
        'cookie_lifetime' => 604800
    )
));

$app->register(new Rpodwika\Silex\YamlConfigServiceProvider(__DIR__ . '/config/config.yml'));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => 'v1.4', 'base_path' => '/css'),
        'img' => array('version' => 'v1', 'base_path' => '/img'),
        'js'  => array('version' => 'v1.2', 'base_path' => '/js'),
        'vendor'  => array('version' => 'v1', 'base_path' => '/vendor'),
        'audio'  => array('version' => 'v1', 'base_path' => '/audio'),
    ),
));

$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
    'translator.domains' => array()
));

$app->extend('twig.runtimes', function ($array) {
   $array[\Symfony\Component\Form\FormRenderer::class] = 'twig.form.renderer'; return $array;
});

?>