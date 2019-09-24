<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $name = $_POST["name"];

    $updateUnit = "UPDATE unit SET name = '$name'";
    $updateUnit .= " WHERE id = $id";
    mysqli_query($conn, $updateUnit) or die("Cannot update unit: " . mysqli_error($conn));
    header('Location: ../display_unit.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>