<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'news');
define('PORT', 3307);

class Database{

    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    public function connect()
    {

        $connection = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $pdo = new \PDO($connection, $this->dbUser, $this->dbPass);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        if($pdo)
        {
            return $pdo;
        }else
        {
            echo 'Provjerite vašu konekciju';
        }
    }

    
}