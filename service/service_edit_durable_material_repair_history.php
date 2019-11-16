<?php
require 'connection.php';
if (isset($_POST["body"])) {
    $body = $_POST["body"];
    $repairID = $_GET["id"];

    for ($i = 0; $i < sizeof($body); $i++) {
        $item = $body[$i];
        $history_id = isset($item["id"]) ? $item["id"] : null;
        $seq = $item["seq"];
        $mileage_number = $item["mileage_number"];
        $fix = $item["fix"];
        $baht = $item["baht"];
        $satang = $item["satang"];
        $place = $item["place"];
        $receive_date = $item["receive_date"];
        $flag1 = $item["flag"];

        if ($history_id == null) {
            $sql = "INSERT INTO durable_material_repair_history(seq, repair_id ,mileage_number , fix, baht,satang ,place ,receive_date ,flag) VALUES($seq, $repairID , $mileage_number , '$fix', '$baht', '$satang' ,'$place' ,'$receive_date' ,'$flag1')";
        } else {
            $sql = "UPDATE durable_material_repair_history SET seq = $seq,";
            $sql .= " mileage_number = $mileage_number, fix = '$fix', baht = '$baht', satang = '$satang', place = '$place', receive_date = '$receive_date', flag = '$flag1' ";
            $sql .= " WHERE id = $history_id";
        }

        $log = "เพิ่มข้อมูลรายละเอียดการซ่อม";
        logServer($conn, $log);

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    $resp["result"] = true;
    echo json_encode($resp);
}
