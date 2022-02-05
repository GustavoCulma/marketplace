<?php
/*=============================================
=La ruta recibe la informacion que viene por la URL =
=============================================*/

$routesArray = explode('/', $_SERVER["REQUEST_URI"]);
$routesArray =array_filter($routesArray);
/*=============================================
= Cuando no se le hace ninguna peticion a la API=
=============================================*/

if (count($routesArray)==0) {
    $json=array(
        'status' =>404,
        'result' =>"Not found"
    );

    echo json_encode($json, http_response_code("$json[status]"));

    return;
} else {

/*=============================================
= Cuando se hace una peticion GET            =
=============================================*/
    if (count($routesArray)==1 &&
    isset($_SERVER["REQUEST_METHOD"])&&
    $_SERVER["REQUEST_METHOD"]=="GET") {
        /*=============================================
        =       peticion GET con filtro              =
        =============================================*/
        if (isset($_GET["linkTo"])&&isset($_GET["equalTo"])) {
            $response = new GetController();
            $response->getFilterData(explode("?", $routesArray[1])[0], $_GET["linkTo"], $_GET["equalTo"]);
        }
        /*==================================================
        =peticion GET entre tablas relacionadas sin filtro=
        ==================================================*/
        elseif (isset($_GET["rel"]) && isset($_GET["type"])&& explode("?", $routesArray[1])[0]=="relations") {
            $response = new GetController();
            $response->getRelData($_GET["rel"], $_GET["type"]);
        } else {
            /*=============================================
            =       peticion GET sin filtro              =
            =============================================*/
            $response= new GetController();
            $response->getData($routesArray[1]);
        }
    }

    /*=============================================
    = Cuando se hace una peticion POST            =
    =============================================*/
    if (count($routesArray)==1 &&
    isset($_SERVER["REQUEST_METHOD"])&&
    $_SERVER["REQUEST_METHOD"]=="POST") {
        $json=array(
        'status' =>200,
        'result' =>"POST"
    );

        echo json_encode($json, http_response_code("$json[status]"));
        return;
    }

    /*=============================================
    = Cuando se hace una peticion PATCH            =
    =============================================*/
    if (count($routesArray)==1 &&
    isset($_SERVER["REQUEST_METHOD"])&&
    $_SERVER["REQUEST_METHOD"]=="PATCH") {
        $json=array(
        'status' =>200,
        'result' =>"PATCH"
    );

        echo json_encode($json, http_response_code("$json[status]"));
        return;
    }


    /*=============================================
    = Cuando se hace una peticion PUT            =
    =============================================*/
    if (count($routesArray)==1 &&
    isset($_SERVER["REQUEST_METHOD"])&&
    $_SERVER["REQUEST_METHOD"]=="PUT") {
        $json=array(
        'status' =>200,
        'result' =>"PUT"
    );

        echo json_encode($json, http_response_code("$json[status]"));
        return;
    }

    /*=============================================
    = Cuando se hace una peticion DELETE            =
    =============================================*/

    if (count($routesArray)==1 &&
    isset($_SERVER["REQUEST_METHOD"])&&
    $_SERVER["REQUEST_METHOD"]=="DELETE") {
        $json=array(
        'status' =>200,
        'result' =>"DELETE"
    );

        echo json_encode($json, http_response_code("$json[status]"));
        return;
    }
}
