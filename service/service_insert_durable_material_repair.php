<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $seq = $_POST["seq"];
    $damageid = $_POST["damage_id"];
    $repairdate = $_POST["repair_date"];
    $place = $_POST["place"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_material_repair(damage_id, repair_date, place, flag)";
    $sql .= " VALUES($damageid, '$repairdate', '$place', '$flag')";

    $log = "เพิ่มข้อมูลการซ่อมวัสดุคงทน";
    logServer($conn, $log);
    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_material_repair.php?message=เพิ่มข้อมูลสำเร็จ');
       
        $sqlUpdate ="UPDATE durable_material SET status = 4 WHERE id = $damageid";
        mysqli_query($conn ,$sqlUpdate);
        // $sqlUpdate ="UPDATE durable_material_damage SET status = 2 WHERE product_id = $damageid";
        // mysqli_query($conn ,$sqlUpdate);
         echo $sqlUpdate;
    } else {
        header('Location: ../display_durable_material_repair.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>