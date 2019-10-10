<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $shortname = $_POST["shortname"];

        $sql = "INSERT INTO durable_articles_type(name,shortname )";
        $sql .= " VALUES('$name', '$shortname')"; 
        $log = "เพิ่มข้อมูลประเภทครุภัณฑ์";
        logServer($conn, $log);
        
        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_articles_type.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_articles_type.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>