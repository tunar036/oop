<?php

namespace service;

require_once "storage/storage.php";

use storage as Storage;
use storage\Storage as StorageStorage;

class User
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class Book
{
    public $id;
    public $name;
    public $author;

    public function __construct(int $id, string $name, User $author)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
    }
}


class Service
{
    private ?Storage\Storage $storage = null;

    public function __construct(Storage\Storage $storage)
    {
        $this->storage = $storage;
    }

    public function addUser(string $name, int $age)
    {
        $user = new User($name, $age);

        $this->storage->addUser($user);
    }

    public function addBook(Book $book)
    {
        return $book;
    }

    public function getUsers(bool $withBooks = false) {
        return $this->storage->getUsers();
    }

}
