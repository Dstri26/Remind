<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    session_start();
    $response = array();
    if (isset($_SESSION["email"])) {
        $response['success']=true;
        $response['email']=$_SESSION["email"];
    }else{
        $response['success']=false;
        $response['email']="None";
    }

    echo json_encode($response);

?>