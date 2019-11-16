<?php
<<<<<<< HEAD
    $obj["result"] = true ;
    $obj["first_name"] = "Apimun";
    $obj["last_name"] = "Klansakul";
    $obj["salary"] = 50000.99;
    $obj["contact"] = array(
        ["type" => "Home","number" => "023218993"], 
        ["type" => "Mobile","number" => "0944895701"]);
=======
    $main["result"] = true;
    $main["first_name"] = "Apimun";
    $main["last_name"] = "Klansakul";
    $main["salary"] = 50000.99;
    
    $mobileHome["type"] = "Home";
    $mobileHome["number"] = "023218993";

    $mobilePhone["type"] = "Mobile";
    $mobilePhone["number"] = "0944895701";
>>>>>>> 5305c55e2a23e3c786d69a75ba63753c8b8db3d3

    $mobile = array();
    array_push($mobile, $mobileHome);
    array_push($mobile, $mobilePhone);
    $main["contacts"] = $mobile;

    echo json_encode($main);
