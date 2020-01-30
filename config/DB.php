<?php
/**
 * Класс конфигурации базы данных
 */
namespace Config;


class DB
{

    const USER  = "user";
    const PASS  = "user";
    const HOST  = "192.168.200.79";
    const DB    = "all-books";

    public static function connToDB() {
        $user   = self::USER;
        $pass   = self::PASS;
        $host   = self::HOST;
        $db     = self::DB;
        $conn   = new \PDO("mysql:dbname=$db;host=$host", $user, $pass);
        $conn->exec("SET NAMES 'utf8'");
        return $conn;
    }

}