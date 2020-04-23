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
    $code = $row["code"];

    $log = "เพิ่มข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง";
    logServer($conn, $log);
    if ($stock > $number) {
        $sql = "INSERT INTO supplies_distribute(product_id ,number ,distribute_date ,department_id , flag)";
        $sql .= " VALUES($idcode[0], '$number', '$distributedate', $departmentId, '$flag')";
        
        if (mysqli_query($conn, $sql)) {

            $sqlSelect = "SELECT d.*,s.supplies_id ,s.code ,s.id as sidd FROM supplies_distribute as d , supplies as s WHERE s.id = $productId";
            echo "select : " . $sqlSelect . "<br>";
            $resultOld = mysqli_query($conn, $sqlSelect);
            $dataOld = mysqli_fetch_assoc($resultOld);
            $numberOld = $dataOld["number"];
            $product = $dataOld["product_id"];
            $sid = $dataOld["sidd"];

            $sqlUpdatestock = "UPDATE supplies_stock SET stock = stock - $number WHERE id = $stockID";
            mysqli_query($conn, $sqlUpdatestock);

            $sqlSelect1 = "SELECT a.*,d.receive ,d.distribute ,d.stock ,d.account_id ,a.id as idd FROM supplies_account as a , supplies_account_detail as d ,supplies as s WHERE d.account_id = a.id and a.product_id = s.id";
            echo "select : " . $sqlSelect1 . "<br>";
            $results = mysqli_query($conn, $sqlSelect1);
            $sa = mysqli_fetch_assoc($results);
            $receive = $sa["receive"];
            $distribute = $sa["distribute"];
            $stock1 = $sa["stock"];
            $account_id = $sa["idd"];
            echo $sqlSelect1;

            $sqlUpdatestock1 = "UPDATE supplies_account_detail SET distribute = $number WHERE account_id = $account_id";
            mysqli_query($conn, $sqlUpdatestock1);
            echo $sqlUpdatestock1;
            // header('Location: ../display_supplies_distribute.php?type=' . $type . '&messagee=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_distribute.php?type=' . $type . '&messagee=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    } else {
        header('Location: ../display_supplies_distribute.php?type=' . $type . '&message=จำนวนที่แจกจ่ายเกินกว่าสินค้าคงเหลือ');
    }
} else {

}
