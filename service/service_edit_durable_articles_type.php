<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $name = $_POST["name"];
    $shortname = $_POST["shortname"];
    
    $updatetype = "UPDATE durable_articles_type SET name = '$name',";
    $updatetype .= " shortname = '$shortname'";
    $updatetype .= " WHERE id = $id";
  
    mysqli_query($conn, $updatetype) or die("Cannot update permits". mysqli_error($conn));
    header('Location: ../display_durable_articles_type.php?message=แก้ไขข้อมูลสำเร็จ');
}
