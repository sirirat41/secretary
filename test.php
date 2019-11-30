<?php
require 'service/connection.php';
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $sqlSelect = "SELECT * FROM durable_articles_purchase WHERE id IN ($id+1,$id,$id-1)";
    $result = mysqli_query($conn, $sqlSelect) or die();
    $data["result"] = true;
    $data["data"] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $sqlSelect1 = "SELECT * FROM durable_articles WHERE id =".$row["product_id"];
        $result1 = mysqli_query($conn, $sqlSelect1) or die();
        $data1 = mysqli_fetch_assoc($result1);
        $row["articles"] = $data1;
        array_push($data["data"], $row);
    }
    echo json_encode($data);
}


// ใช้ md5
//$input ="1111";
//echo md5($input);



// $obj["result"] = true;
// $obn["name"] = "Apimun Klansakul";
// $obn["age"] = 28;
// $obj["personality"] = ($obn) ;
// $boa["home"] = "023218993" ;
// $boa["mobile"] = "0944895701";
// $obm["mobile"] = ($boa);

// $obnn["number"] = "426";
// $obnn["street"] = "Onnut" ; 
// $obnn["soi"] = "35" ;
// $obnn["district"] = "Sounloung";
// $obnn["province"] = "Bangkok";
// $obm["address"] = ($obnn);

// $obj["contacts"] = $obm ;


// $Mo = array("Coding" , "Play Games" , "Read Novel");
// $obj["hobbies"] = $Mo;


// $obj["result"] = true;
// $obj["first_name"] = "Apimun";
// $obj["last_name"] = "Klansakul";
// $obj["salary"] = 50000.99;

// $obi["type"] = "Home";
// $obi["number"] = "023218993";
// $obo["type"] = "Mobile";

// $obo["number"] = "0944895701";

// $Mo = array();
// array_push($Mo, $obi);
// array_push($Mo, $obo);
// $obj["contacts"] = $Mo;

// echo json_encode($obj);
