<?php

namespace storage;

require_once "service/service.php";

use service as Service;

interface DB
{
    public function query(string $query): DbResult;
    public function querygetUsers(string $query): DbResult;
}

class DbResult
{
    public \PgSql\Result $rows;

    public function __construct(\PgSql\Result $rows)
    {
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
        $this->db->query("insert into users ( name, age) values ('" . $user->name . "', " . $user->age . ")");
    }

    public function addBook(Service\Book $book)
    {
        $this->db->query("insert into books ( user_id, name) values ('" . $book->user_id . "', '" . $book->name . "')");
    }

    public function getUsers(bool $withBooks = false)
    {
        if ($withBooks) {
            $result = $this->db->querygetUsers("select users.id , users.name ,books.name from users LEFT JOIN books on users.id=books.user_id");
        }else{
            $result = $this->db->querygetUsers("select * from users");
        }

        while ($row = pg_fetch_row($result->rows)) {
            var_dump($row);
            // foreach ($row as $key => $value) {
            //    echo $key .'-'. $value. ' <br> ';
            // }
            // echo "<br />\n";
            // echo "id: $row[0]  Name: $row[1]";
            // echo "<br />\n";
            // if ($withBooks) {
            //     // echo "book: $row[5]";
            // }
        }
    }

    public function getBooks(){
        $result = $this->db->querygetUsers("select * from books");

        while ($row = pg_fetch_row($result->rows)) {
            var_dump($row);
        }
    }

    public function getUsersBooks(int $user_id){
       $result = $this->db->querygetUsers("select * from books where user_id=$user_id");
       while ($row = pg_fetch_row($result->rows)) {
        var_dump($row);
    }
    }
}
