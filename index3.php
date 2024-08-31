<?php

class Math {

    private static int  $ad = 15;
    public  $soyad = "Google2";


    public static function pi( int|float $x){
        return $x*self::$ad;
    }
}

// $test = new User();
// echo $test->ad;

echo Math::pi(5);
