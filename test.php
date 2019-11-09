<?php
    $obj["result"] = true ;
    $obj["first_name"] = "Apimun";
    $obj["last_name"] = "Klansakul";
    $obj["mobile"] = ["023218993","0944895701"];
    $obj["cars"] = [ "Ford", "BMW", "Fiat" ];


    echo json_encode($obj);
?>