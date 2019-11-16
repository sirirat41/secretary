<?php
    $main["result"] = true;
    $main["first_name"] = "Apimun";
    $main["last_name"] = "Klansakul";
    $main["salary"] = 50000.99;
    
    $mobileHome["type"] = "Home";
    $mobileHome["number"] = "023218993";

    $mobilePhone["type"] = "Mobile";
    $mobilePhone["number"] = "0944895701";

    $mobile = array();
    array_push($mobile, $mobileHome);
    array_push($mobile, $mobilePhone);
    $main["contacts"] = $mobile;

    echo json_encode($main);
