<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seq = $_POST["seq"];
    $damageid = $_POST["damage_id"];
    $repairdate = $_POST["repair_date"];
    $place = $_POST["place"];

    $sql = "INSERT INTO durable_material_repair(seq, damage_id, repair_date, place)";
    $sql .= " VALUES($seq, $damageid, '$repairdate', '$place')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_material_repair.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_repair.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>