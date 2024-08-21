<?php

class Database
{
    public static $connection;
    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "Hansaka@29936", "libarate", 3306);
        }
    }

    public static function search($query)
    {
        Database::setUpConnection();
        $resultSet = Database::$connection->query($query);
        return $resultSet;
        // return Database::$connection->query($query);
    }

    public static function iud($query)
    {
        Database::setUpConnection();
        Database::$connection->query($query);
    }
}
