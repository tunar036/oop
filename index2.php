<?php

class Test
{
    // public  function version() {
    //     return "v2";
    // }

    protected $user = "Tunar";

    public function setUserName(string $user)
    {
        // log activity 

        echo "name changed: " . $this->user . " -> " . $user . "</br>";
        
        $this->user = "n" . $user . " user";  
    }

    public function getUserName(){
        return $this->user . "</br>";
    }
}


$user = new Test();

// echo Test::version();

// echo $user->user;
// echo $user->getUserName();
// $user->setUserName("maga");

// $user->setUserName("Sahmar");

// echo $user->getUserName();

class Test2 extends Test{
    public function getUserName(){
        return $this->user;
    }
}

$new = new Test2();
// echo $new->user;