<?php
require "service/connection.php";
?>

  <?php
  $sql = "SELECT * FROM durable_articles_purchase";
  $data = array();
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($data, $row);
  }
  echo json_encode($data);
  ?>