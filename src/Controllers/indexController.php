<?php
    
namespace Controllers;

use Silex\Application;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class indexController {
    
    public function index(Application $app, Request $request) {
        
        return $app['twig']->render('home/index.twig.html', []);
        
    }
    
}