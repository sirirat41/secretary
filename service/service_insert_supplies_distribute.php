<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];
    $number = $_POST["number"];
    $distributedate = $_POST["distribute_date"];
    $departmentId = $_POST["department_id"];
    $flag = $_POST["flag"];

    $idcode = explode(":", $productId);

    $sqlstock = "SELECT * FROM supplies_stock WHERE id IN (SELECT supplies_id FROM (SELECT supplies_id FROM supplies WHERE code = '$idcode[1]') tmp)";
    echo $sqlstock . "<br>";
    $result = mysqli_query($conn, $sqlstock);
    $row = mysqli_fetch_assoc($result);
    $stockID = $row["id"];
    $stock = $row["stock"];
    $supplies = $row["supplies_id"];
    $type = $row["type"];

    $log = "เพิ่มข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง";
    logServer($conn, $log);
    if ($stock > $number) {
        $sql = "INSERT INTO supplies_distribute(product_id ,number ,distribute_date ,department_id , flag)";
        $sql .= " VALUES($idcode[0], '$number', '$distributedate', $departmentId, '$flag')";
        
        if (mysqli_query($conn, $sql)) {

            $sqlSelect = "SELECT d.*,s.supplies_id ,s.code FROM supplies_distribute as d , supplies as s WHERE s.id = $productId";
            echo "select : " . $sqlSelect . "<br>";
            $resultOld = mysqli_query($conn, $sqlSelect);
            $dataOld = mysqli_fetch_assoc($resultOld);
            $numberOld = $dataOld["number"];
            $product = $dataOld["product_id"];

            $sqlUpdatestock = "UPDATE supplies_stock SET stock = stock - $number WHERE id = $stockID";
            mysqli_query($conn, $sqlUpdatestock);
            header('Location: ../display_supplies_distribute.php?type=' . $type . '&messagee=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_distribute.php?messagee=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    } else {
        header('Location: ../display_supplies_distribute.php?message=จำนวนที่แจกจ่ายเกินกว่าสินค้าคงเหลือ');
    }
} else {

}
