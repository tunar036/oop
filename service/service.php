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
    // public $id;
    public $user_id;
    public $name;

    public function __construct(int $user_id, string $name)
    {
        // $this->id = $id;
        $this->user_id = $user_id;
        $this->name = $name;
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

    public function addBook(int $user_id, string $name)
    {
        $book = new Book($user_id, $name);
        $this->storage->addBook($book);
    }

    public function getUsers(bool $withBooks = false)
    {
        if ($withBooks) {
            return $this->storage->getUsers($withBooks);
        }
        return $this->storage->getUsers();
    }

    public function getBooks()
    {
        return $this->storage->getBooks();;
    }

    public function getUsersBooks(int $user_id)
    {
        return $this->storage->getUsersBooks($user_id);
    }
}
