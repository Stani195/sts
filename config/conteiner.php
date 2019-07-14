<?php


use Aura\Di\ContainerBuilder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\DatabasePresenceVerifier;
use Illuminate\Validation\Factory;
use st_php3\Action\SignUpAction;
use st_php3\Hash\Argon2i;
use st_php3\Hash\Bcrypt;
use st_php3\Hash\HashInterface;


$builder = new ContainerBuilder();
$conteiner = $builder->newInstance();

//$conteiner->set(HashInterface::class, function (){
//    return new Bcrypt();
//});
//
//$conteiner->set(SignUpAction::class, function () use ($conteiner){
//    /** @var HashInterface $hash */
//    $hash = $conteiner->get(HashInterface::class);
//
//    $action = new SignUpAction($hash);
//    return $action;
//});
//

$conteiner->set('validator', function () use ($capsule) {
$filesystem = new Filesystem();
$loader = new FileLoader($filesystem,dirname(dirname(__FILE__)) .'/resources/lang');

$loader->addNamespace('lang', (dirname(__FILE__)) . '/resources/lang');
$loader->load($lang = 'ru', $group = 'validation', $namespace = 'lang');

$factory = new Translator($loader, 'ru');
$validator = new Factory($factory);

$databasePresenceVerifier = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validator->setPresenceVerifier($databasePresenceVerifier);
return $validator;
});

$conteiner->set(SignUpAction::class, function () use($conteiner){
   return new SignUpAction($conteiner->get('validator'));
});
