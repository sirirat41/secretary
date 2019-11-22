<?php
{
 
    $obj["result"] = true; 
    $obj["first_name"] = "Apimun"; 
    $obj["last__name"] = "Klansakul"; 
    $obj["salary"] = "Klansakul";

    $obj["contect"] = array(['type' => "Home", 'number' => "023218993"] ,['type' => "mobile" ,'number' => "0945648787" ] );

}
array_push($obj['contect'] );
echo json_encode($obj);
?>
