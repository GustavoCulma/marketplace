<?php
/*=============================================
= Controlador que realiza todas las peticiones GET=
=============================================*/
class GetController
{
    /*=============================================
    =       peticion GET sin filtro              =
    =============================================*/
    public function getData($table)
    {
        $response= GetModel::getData($table);
        $return =  new GetController();
        $return-> fncResponse($response, "getData");
    }

    /*=============================================
    =       peticion GET con filtro              =
    =============================================*/
    public function getFilterData($table, $linkTo, $equalTo)
    {
        $response= GetModel::getFilterData($table, $linkTo, $equalTo);
        $return =  new GetController();
        $return-> fncResponse($response, "getFilterData");
    }
    /*================================================peticion GET entre tablas relacionadas sin filtro = ================================================*/
    public function getRelData($rel, $type)
    {
        $response= GetModel::getRelData($rel, $type);
        $return =  new GetController();
        $return-> fncResponse($response, "getRelData");
    }
    /*================================================         Respuestas del controlador          = ===============================================*/
    public function fncResponse($response, $method)
    {
        if (!empty($response)) {
            $json=array(
            'status' =>200,
            'total'=>count($response),
            'result' =>$response
        );
            echo json_encode($json, http_response_code("$json[status]"));
            return;
        } else {
            $json=array(
            'status' =>404,
            'result' =>"Not found",
            'method'=> $method
        );
            echo json_encode($json, http_response_code("$json[status]"));
            return;
        }
    }
}
