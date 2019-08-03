<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $shortname = $_POST["shortname"];
    $owner = $_POST["owner"];
    $bulding = $_POST["bulding"];
    $floor = $_POST["floor"];

    $sql = "INSERT INTO department(fullname, shortname, owner, bulding, floor)";
    $sql .= " VALUES('$fullname', '$shortname', '$owner', '$bulding', '$floor')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_department.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_department.php?message=เพิ่มข้อมูลไม้สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>