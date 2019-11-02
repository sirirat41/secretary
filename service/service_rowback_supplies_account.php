<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['account_id'])) {
    $id = $_POST["id"];
    $account_id = $_POST["account_id"];
    $sqlUpdate = "UPDATE supplies_account SET status = 1 WHERE id = " . $account_id;
    
    $log = "ลบข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $account_id;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_supplies_account.php?message=กู้คืนข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_supplies_account.php?message=กู้คืนข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../rowback_supplies_account.php?message=ข้อมูลผิดพลาด');
}
