<?php
class Database
{
    public function connect()
    {
        $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    }
}
