<?php
//it allows any type of database.

define("serverName", "https://net24bkoskamp.gc-webhosting.nl/");
define("database", "net24bkoskamp_datingdb");
define("username", "net24bkoskamp_bram");
define("password", "@ppel123!");
define("connectionString", "mysql:host=" . serverName . ";dbname=" . database);

function getConnection()
{
    try {
        $connection = new PDO(connectionString, username, password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $exception) {
        echo "Connection failed: " . $exception->getMessage();
    }
}

function query($query, $connection)
{
    if (!isset($connection)) {
        throw new PDOException("Connection not established");
    }
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt;
}

$connection = null; //Closing connection.