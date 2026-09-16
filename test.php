<?php
Test::greet();
class Test{

    public static $name = "Lenny Larson";

    public static function greet(){
        echo "Hello " . self::$name;
    }

}

