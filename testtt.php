<?php
{
 
    $obj["result"] = true; 
    $per["name"] = "Apimun klansakul"; 
    $per["age"] = "28";
    $obj["personality"] = $per;

    $mobile["home"] = "023218993";
    $mobile["mobile"] = "023218993";
    
    $address["number"] = "426";
    $address["street"] = "Onnut";
    $address["soi"] = "35";
    $address["district"] = "Sounloung";
    $address["province"] = "Bangkok";

    $contect["mobile"] = $mobile;
    $contect["address"] = $address;
    
    $obj["contects"] = $contect;

    $obj["hobbies"] = array("Coding", "Play Games" ,"Read Novel");
    // $obj["contect"] = array(['type' => "Home", 'number' => "023218993"] ,['type' => "mobile" ,'number' => "0945648787" ] );

}
// array_push($obj['hobbies']);
echo json_encode($obj);
?> 
