<?php

//requiriendo la conexion
require_once"connection.php";

//creeando la clase get model
class GetModel
{
    /*=============================================
    =       peticion GET sin filtro              =
    =============================================*/
    public static function getData($table)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt ->execute();
        //retornando unicamente las propiedades o nombres columnas
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    /*=============================================
    =       peticion GET con filtro              =
    =============================================*/
    public static function getFilterData(
        $table,
        $linkTo,
        $equalTo
    ) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $linkTo= :$linkTo");
        $stmt->bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);

        $stmt ->execute();
        //retornando unicamente las propiedades o nombres columnas
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }  
    /*=============================================
    =peticiones GET entre tablas relacionadas sin filtro=
    =============================================*/
    public static function getRelData($rel, $type)
    {
        $relArray = explode(",", $rel);
        $typeArray = explode(",", $type);
    
        $on1=$relArray[0].".id_".$typeArray[0];
        $on2=$relArray[1].".id_".$typeArray[0]."_".$typeArray[1];

        $stmt = Connection::connect()->prepare("SELECT * FROM $relArray[0] INNER JOIN $relArray[1] ON  $on1 = $on2");
        $stmt ->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
}
