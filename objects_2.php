<?php

class StaticExample
{
    static public $aNum = 0;

    public static function sayHello()
    {
        self::$aNum++;
        print "Привет! (" . self::$aNum . ")";
    }
}
































