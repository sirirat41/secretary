<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $shortname = $_POST["shortname"];
    $fax = $_POST["fax"];
    $bulding = $_POST["bulding"];
    $floor = $_POST["floor"];


    $target_dir = "../depart/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    $sql = "INSERT INTO department(fullname, shortname, fax, bulding, floor ,pic)";
    $sql .= " VALUES('$fullname', '$shortname', '$fax', '$bulding', '$floor','$imgeName')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_department.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_department.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}
header('Location: ../display_department.php?message=เพิ่มข้อมูลสำเร็จ');

?>