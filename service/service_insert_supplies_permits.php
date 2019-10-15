<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];
    $bookno = $_POST["book_no"];
    $permitdate = $_POST["permit_date"];
    $receivedate = $_POST["receive_date"];
    $department_id = $_POST["department_id"];
    $number = $_POST["number"];
    $flag = $_POST["flag"];
    $supplies_id = $_POST["supplies_id"];

    $idcode = explode(":" , $productId);

    $sqlstock = "SELECT * FROM supplies_stock WHERE id IN (SELECT supplies_id FROM (SELECT supplies_id FROM supplies WHERE code = $idcode[1]) tmp)";
    $result = mysqli_query($conn, $sqlstock);
    $row = mysqli_fetch_assoc($result);
    $stockID = $row["id"];
    $stock = $row["stock"];

    $log = "เพิ่มข้อมูลการยืม-คืนวัสดุสิ้นเปลือง ";
    logServer($conn, $log);

    if ($stock >= $number) {
        $sql = "INSERT INTO supplies_permits(product_id ,book_no ,permit_date ,receive_date,department_id,number, flag)";
        $sql .= " VALUES($idcode[0], '$bookno' , '$permitdate', '$receivedate' ,$department_id,'$number', '$flag')";

        if (mysqli_query($conn, $sql)) {

            $sqlUpdate = "UPDATE supplies SET status = 2 WHERE id IN ( SELECT id FROM( SELECT id FROM supplies WHERE status = 1 and code = '$idcode[1]' LIMIT $number)tmp)";
            mysqli_query($conn, $sqlUpdate);


            $sqlUpdatestock = "UPDATE supplies_stock SET stock = stock - $number WHERE id = $stockID";
            mysqli_query($conn, $sqlUpdatestock);
            header('Location: ../display_supplies_permits.php?messagee=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_permits.php?messagee=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    } else {

        header('Location: ../display_supplies_permits.php?message=จำนวนที่ยืมเกินกว่าสินค้าคงเหลือ');
    }
} else { }
