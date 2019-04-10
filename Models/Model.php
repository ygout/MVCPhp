<?php

abstract  class Model
{
    private static $_bdd;
    private static function setBdd()
    {
        try
        {
            self::$_bdd = new PDO('mysql:host=localhost;dbname=blog','root','');
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch (Exception $ex)
        {
            error_log($ex->getMessage());
            exit('Error Connection DB');
        }

    }
    protected function getBdd()
    {
        if(self::$_bdd == null)
        {
            self::setBdd();
        }

        return self::$_bdd;
    }
    protected  function getAll($table, $obj)
    {
        $var = [];
        $req = self::$_bdd->prepare('SELECT * from ' .$table. ' ORDER BY id Desc');
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        $req->closeCursor();
        return $var;

    }
}