<?php
require 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM durable_material_damage WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);
    $array = array();

    
  while ($row = mysqli_fetch_array($result)){
    array_push($array ,$row);
}
    echo json_encode($array);
  } else {
      echo json_encode(array());
  }

