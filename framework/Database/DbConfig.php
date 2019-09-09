<?php

class DbConfig
{
    public function dbConnect()
    {
        try
        {
            $db = new PDO("mysql:host=localhost;dbname=mvc","root","");
            return $db;            
        }
        catch(PDOException $e)
        {
            print $e->getMessage();
        }
    }
}

$dbObject = new DbConfig();
$dbObject->dbConnect();
