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
            if ($mileage_number == "" || $mileage_number == null) $mileage_number = 0;
            $sql = "INSERT INTO durable_articles_repair_history(seq, repair_id ,mileage_number , fix, baht,satang ,place ,receive_date ,flag) VALUES(1, $repairID , $mileage_number , '$fix', '$baht', '$satang' ,'$place' ,'$receive_date' ,'$flag1')";
            if($receive_date != null && $receive_date != ""){
                $sqlrepair = "SELECT * FROM durable_articles_repair WHERE id = $repairID";
                $result = mysqli_query($conn , $sqlrepair);
                $data = mysqli_fetch_assoc($result);
                $damageID = $data["damage_id"]; 

                $sqldamage = "SELECT * FROM durable_articles_damage WHERE id = $damageID";
                $result = mysqli_query($conn , $sqldamage);
                $data = mysqli_fetch_assoc($result);
                $ProductID = $data["product_id"];

                $sqlarticles = "UPDATE durable_articles SET status = 1 WHERE id = $ProductID";
                mysqli_query($conn, $sqlarticles);

            }
        } else {
            $sql = "UPDATE durable_articles_repair_history SET seq = $seq,";
            $sql .= " mileage_number = $mileage_number, fix = '$fix', baht = '$baht', satang = '$satang', place = '$place', receive_date = '$receive_date', flag = '$flag1' ";
            $sql .= " WHERE id = $history_id";
            // echo $sqlarticles;
      
        }

        $log = "เพิ่มข้อมูลรายละเอียดการซ่อม";
        logServer($conn, $log);

        mysqli_query($conn, $sql) or die(mysqli_error($conn).$sql);
    }
    $resp["result"] = true;
    echo json_encode($resp);
}
