<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;


$engineResolver = new EngineResolver();

$fileSystem = new Filesystem();
$fileViewFinder = new FileViewFinder(
    $fileSystem, ['../resources/views']

);

$compiler = new BladeCompiler($fileSystem,'../resources/cache');

$engineResolver->register('blade', function () use ($compiler){
    return new CompilerEngine($compiler);
});

$container = new Container();
$dispatcher = new Dispatcher($container);

$blade  = new Factory( $engineResolver, $fileViewFinder, $dispatcher );

function view($teamplateName, array $params = []){
    global $blade;
    return $blade->make($teamplateName, $params);
}