<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $sql = "INSERT INTO unit(name)";
    $sql .= " VALUES('$name')";

    $log = "เพิ่มข้อมูลหน่วยนับ ";
    logServer($conn, $log);

    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_unit.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_unit.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>