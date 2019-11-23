<?php
require 'service/connection.php';

$iss = (isset($_GET["search"]));
if ($iss) {

 
    $search = $_GET["search"];
    
    
    $sqlSelectUser = "SELECT id, username, surname, lastname, tel, position, email FROM user WHERE surname like '%$search%' or lastname  like '%$search%'";
  
    $result = mysqli_query($conn, $sqlSelectUser) or die();
    $data["result"] = true;
    $data["data"] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($data["data"], $row);
    }
    echo json_encode($data);
}
