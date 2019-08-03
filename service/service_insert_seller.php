<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $fax = $_POST["fax"];
    $address = $_POST["address"];

    $sql = "INSERT INTO seller(name, tel, fax, address)";
    $sql .= " VALUES('$name', '$tel', '$fax', '$address')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_seller.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_seller.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>