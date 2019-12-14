<?php
require 'service/connection.php';

if(isset($_GET['id'])) {

    $id = $_GET["id"];

    $sqlArticles = "SELECT * FROM durable_articles_purchase WHERE id IN($id+1 ,$id ,$id-1)";

   
  
    // $sqlSelectUser = "SELECT id, username, surname, lastname, tel, position, email FROM user WHERE surname like '%$search%' or lastname  like '%$search%'";
  
    $result = mysqli_query($conn, $sqlArticles) or die();
    $data["result"] = true;
    $data["data"] = array();

    while ($row = mysqli_fetch_assoc($result)) {
   
         $sqlArticles = "SELECT * FROM durable_articles WHERE id = ".$row["product_id"];
         $result2 = mysqli_query($conn, $sqlArticles) or die();
            
        $data2 = mysqli_fetch_assoc($result2);
         $row["product"] = $data2;
         array_push($data["data"], $row);  

    
    }  
    echo json_encode($data);
    
}