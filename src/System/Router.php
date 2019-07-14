<?php


namespace project\System;


class Router
{
    public static $routes;

    public static function add(
        string $name,
        array $methods,
        string $url,
        array $parameters,
        string $action)
    {
        $pattern = str_replace('/', '\/', $url);
        $pattern = '/' . '(' . implode('|', $methods) . ')' . $pattern . '$/';

        foreach ($parameters as $key => $value) {
            $pattern = str_replace($key, $value, $pattern);
        }

        self::$routes[$name] = ['pattern' => $pattern, 'class' => $action];
    }

    public static function match($url)
    {
        foreach (self::$routes as $key => $route) {
            if (preg_match($route['pattern'], $_SERVER['REQUEST_METHOD'] . $url)) {

                $class = new $route['class'];
                $html = $class();

                return $html;
            }
        }

        return false;
    }
}