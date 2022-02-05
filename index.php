<?php
/*=============================================
=CORS Compartir recursos a distintos origines=
=============================================*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

/*=============================================
=Requiriendo los archivos para que cargen en cualquiera de los archivos que desee usar=
=============================================*/

require_once "controllers/get.controller.php";
require_once "models/get.model.php";

/*=============================================
=      ecutando la ruta principal =
=============================================*/
require_once "controllers/route.controller.php";
$index =new RoutesController();
$index->index();
