<?php

namespace db;

require_once "storage/storage.php";

use storage as Storage;

class Postgres implements Storage\DB
{
    private ?\PgSql\Connection $conn = null;

    public function __construct(string $db_dsn)
    {
        $conn = pg_connect($db_dsn);

        if (!$conn) {
            echo "An error occurred - failed to connect to the DB.\n";
            exit;
        }

        if (!pg_ping($conn))
            die("Connection is broken\n");

        $this->conn = $conn;
    }

    public function query(string $sql): Storage\DbResult
    {
        $result = pg_query($this->conn, $sql);

        $res = new \Storage\DbResult($result);
            // var_dump($res);
            // die();
        return $res;
    }

    public function querygetUsers(string $sql): Storage\DbResult
    {
        $result = pg_query($this->conn, $sql) or die('Error message: ' . pg_last_error());


        $res = new \Storage\DbResult($result);

        return $res;
    }
}


