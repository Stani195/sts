<?php


namespace project;

use PDO;

class Database
{
 private static $instance;

 public static function getInstance()
 {
     if (self::$instance == null){
         self::$instance = new \PDO('mysql:host=localhost;dbname=sts', 'root','secret');
     }
     return self::$instance;
 }
}