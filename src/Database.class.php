<?php

namespace NtSchool;

class Database
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=cv', 'root', 'secret');
        }

        return self::$instance;
    }
}
