<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seq = $_POST["seq"];
    $damageid = $_POST["damage_id"];
    $repairdate = $_POST["repair_date"];
    $place = $_POST["place"];

    $sql = "INSERT INTO durable_articles_repair(seq, damage_id, repair_date, place)";
    $sql .= " VALUES($seq, $damageid, '$repairdate', '$place')";

    $log = "เพิ่มข้อมูลการซ่อมครุภัณฑ์";
    logServer($conn, $log);
    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_articles_repair.php?message=เพิ่มข้อมูลสำเร็จ');
        $sqlUpdate ="UPDATE durable_articles SET status = 4 WHERE id = $damageid";
        mysqli_query($conn ,$sqlUpdate);
    } else {
        header('Location: ../display_durable_articles_repair.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>