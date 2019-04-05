<?php

abstract  class Model
{
    private static $_bdd;
    private static function setBdd()
    {
        self::$_bdd = new PDO('','','');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    protected function getBdd()
    {
        if(self::$_bdd == null)
        {
            self::setBdd();
        }

        return self::$_bdd;
    }
}