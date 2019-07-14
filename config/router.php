<?php

use Aura\Router\RouterContainer;
use st_php3\Action\ArticleGetAction;
use st_php3\Action\CitieGetAction;
use st_php3\Action\HomeAction;
use st_php3\Action\LanguageGetAction;
use st_php3\Action\SignUpAction;
use st_php3\Action\UserGetAction;
use st_php3\Model\Article;

$routerConteiner = new RouterContainer();
$router = $routerConteiner->getMap();

$router->get('home', '/',HomeAction::class);
$router->get('user.get','/users/{id}', UserGetAction::class);
$router->get('language.get','/language/{id}',LanguageGetAction::class);
$router->get('article.get','/articles/{id}', ArticleGetAction::class);
$router->get('get.sign-up','/sign-up', SignUpAction::class);
$router->post('post.sign-up','/sign-up', SignUpAction::class);



