<?php
    $obj["result"] = true ;
    $obj["first_name"] = "Apimun";
    $obj["last_name"] = "Klansakul";
    $obj["salary"] = 50000.99;
    $obi["type"] = "Home" ;
    $obi["number"] = "023218993";
    $obo["type"] = "Mobile" ;
    $obo["number"] = "0944895701";
    $obj["contacts"] = array($obi, $obo);

   
    


    echo json_encode($obj);
