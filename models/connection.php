<?php

/*==================================================
=        conexion con la base de datos        =
==================================================*/

class Connection
{
    public static function connect()
    {
        try {
            $link = new PDO("mysql:host=localhost;dbname=marketplace", "root", "");

            $link->exec("uf8 setname");
        } catch (PDOException $e) {
            die("Error: ".$e->getMessage());
        }

        return $link;
    }
}
