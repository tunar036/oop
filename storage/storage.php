<?php

namespace storage;

require_once "service/service.php";

use service as Service;

interface DB
{
    public function query(string $query): DbResult;
    public function querygetUsers(string $query): DbResult;
}

class DbResult {
    public \PgSql\Result $rows;

    public function __construct(\PgSql\Result $rows) {
        $this->rows = $rows;
    }
}


class Storage
{
    private ?DB $db = null;

    public function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    public function addUser(Service\User $user)
    {

        $this->db->query("insert into users (id, name, age) values (2,'". $user->name . "', " . $user->age . ")");
    }

    public function getUsers(){
         $result = $this->db->querygetUsers("select * from users");

        while ($row = pg_fetch_row($result->rows)) {
            var_dump($row);
        }
    }
}
