<?php

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use http\Env;
use st_php3\Action\HomeAction;
use st_php3\Model\countrie;
use st_php3\Model\User;

require_once '../vendor/autoload.php';
require_once '../config/dotenv.php';
require_once '../config/database.php';
require_once  '../config/view.php';
require_once  '../config/router.php';
//use st_php3\SomeClass;
//$cls = new SomeClass();
//$cls->strread();
//echo env('DB_HOST');

//$countrie = countrie::find(2);
//var_dump($countrie->name);


$serverRequest = ServerRequest::fromGlobals();
$matcher = $routerConteiner->getMatcher();

if ($action = $matcher->match($serverRequest)){
    foreach ($action->attributes as $name => $attribute){
        $serverRequest = $serverRequest->withAttribute($name, $attribute);
    }

    $action = new $action->handler;



    $respone = new Response();
    $respone->getBody()->write(call_user_func($action, $serverRequest));
    echo $respone->getBody();
}
// $password = '1234856' ;
//
//$hash = password_hash($password, PASSWORD_BCRYPT);
//
//if (password_needs_rehash($hash, PASSWORD_ARGON2I)){
//   $hash = password_hash($password, PASSWORD_ARGON2I);
//   // @todo save new hash to db
//}

