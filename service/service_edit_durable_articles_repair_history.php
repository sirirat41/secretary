<?php
require 'connection.php';
if (isset($_POST["body"])) {
    $body = $_POST["body"];
    $repairID = $_GET["id"];
    //receive_donate data
    // $seq = $_POST["seq"];
    // $repairid = $_POST["repair_id"];
    // $price = $_POST["price"];
    // $receivedate = $_POST["receive_date"];
    // $fix = $_POST["fix"];
    // $flag = $_POST["flag"];

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
            $sql = "INSERT INTO durable_articles_repair_history(seq, repair_id ,mileage_number , fix, baht,satang ,place ,receive_date ,flag) VALUES($seq, $repairID , $mileage_number , '$fix', '$baht', '$satang' ,'$place' ,'$receive_date' ,'$flag1')";
        } else {
            $sql = "UPDATE durable_articles_repair_history SET seq = $seq,";
            $sql .= " mileage_number = $mileage_number, fix = '$fix', baht = '$baht', satang = '$satang', place = '$place', receive_date = '$receive_date', flag = '$flag1' ";
            $sql .= " WHERE id = $history_id";
        }

        $log = "เพิ่มข้อมูลรายละเอียดการซ่อม";
        logServer($conn, $log);

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    //header('Location: ../display_durable_articles_repair.php?message=เพิ่มข้อมูลสำเร็จ');
    $resp["result"] = true;
    echo json_encode($resp);
}

//     $log = "แก้ไขข้อมูลประวัติการซ่อมครุภัณฑ์ รหัส " . $id ;
//     logServer($conn, $log);

//     $updaterepairhistory = "UPDATE durable_articles_repair_history SET seq = $seq,";
//     $updaterepairhistory .= " price = $price, receive_date = '$receivedate', fix = '$fix', flag = '$flag' ";
//     $updaterepairhistory .= " WHERE id = $id";
//     mysqli_query($conn, $updaterepairhistory) or die("Cannot update repair_history" . mysqli_error($conn));
//     header('Location: ../display_durable_articles_repair_history.php?message=แก้ไขข้อมูลสำเร็จ');

// }
