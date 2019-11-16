<?php
    $obj["result"] = true ;
    $obj["first_name"] = "Apimun";
    $obj["last_name"] = "Klansakul";
    $obj["salary"] = 50000.99;
    $obj["contact"] = array(
        ["type" => "Home","number" => "023218993"], 
        ["type" => "Mobile","number" => "0944895701"]);

    echo json_encode($obj);
?>