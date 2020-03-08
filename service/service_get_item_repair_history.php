<?php
require 'connection.php';
if (isset($_POST['id'])) {
    $damage_id = $_POST["id"];
    $sqlSelectProductid = "SELECT product_id FROM durable_articles_damage WHERE id = $damage_id";
    $resultProductId = mysqli_query($conn, $sqlSelectProductid);
    $dataProduct = mysqli_fetch_assoc($resultProductId);
    $productid = $dataProduct["product_id"];
    $sql = "SELECT * FROM durable_articles_damage WHERE product_id = $productid";
    $resultdamage = mysqli_query($conn, $sql);
    $response = array();

  while ($damage = mysqli_fetch_assoc($resultdamage)){

    $sqlrepair = "SELECT * FROM durable_articles_repair WHERE damage_id = ".$damage["id"];
    $resultrapair = mysqli_query($conn, $sqlrepair);
    while ($row = mysqli_fetch_array($resultrapair)){

    array_push($response ,$row);

    }

}
    echo json_encode($response);
  } else {
      echo json_encode(array());
  }


