<?php

require_once "db/conn.php";
require_once "service/service.php";
require_once "storage/storage.php";

use service as Service;
use db as DB;
use storage as Storage;


class App {
    public ?Service\Service $service = null;


    public function __construct(){
        echo "Running...\n";

        // db connection
        $db = new DB\Postgres("postgres://postgres:123123@localhost:5432/postgres?sslmode=disable");
        // storage instance
        $storage = new Storage\Storage($db);

        // service instance
        $service = new Service\Service($storage);

        $this->service = $service;
    }

    public function run() {
        // $user = new Service\User("Tuni");

        // add user
        // $this->service->addUser("Maga", 30);

        // get users
        // $this->service->getUsers(1);
        
        // add book 
        // $this->service->addBook(9,"test kitab");

        // get books
        // $this->service->getBooks();

        //get user's books
        // $this->service->getUsersBooks(10);
    }
}

$app = new App();

$app->run();

?>