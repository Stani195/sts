<?php

use Aura\Router\RouterContainer;
use st_php3\Action\CitieGetAction;
use st_php3\Action\HomeAction;
use st_php3\Action\LanguageGetAction;
use st_php3\Action\UserGetAction;

$routerConteiner = new RouterContainer();
$router = $routerConteiner->getMap();

$router->get('home', '/',HomeAction::class);
$router->get('user.get','/users/{id}', UserGetAction::class);
$router->get('language.get','/language/{id}',LanguageGetAction::class);
$router->get('citie.get', '/citie/{id}', CitieGetAction::class);
