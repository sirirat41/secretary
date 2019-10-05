<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $number = $_POST["number"];
        $distributedate = $_POST["distribute_date"];
        $departmentId = $_POST["department_id"];
        $flag = $_POST["flag"];

        
    $sqlstock = "SELECT * FROM supplies_stock WHERE id IN (SELECT supplies_id FROM (SELECT supplies_id FROM supplies WHERE code = $productId) tmp)";
    $result = mysqli_query($conn, $sqlstock);
    $row = mysqli_fetch_assoc($result);
    $stockID = $row["id"];
    $stock = $row["stock"];
    
    if ($stock >= $number) {
        $sql = "INSERT INTO supplies_distribute(product_id ,number ,distribute_date ,department_id , flag)";
        $sql .= " VALUES($productId, '$number', '$distributedate', $departmentId, '$flag')"; 

    

        if (mysqli_query($conn, $sql)) {
            
       $sqlUpdate = "UPDATE supplies SET status = 10 WHERE id IN ( SELECT id FROM( SELECT id FROM supplies WHERE status = 1 and code = '$productId' LIMIT $number)tmp)";
        mysqli_query($conn, $sqlUpdate);
        
            $sqlUpdatestock = "UPDATE supplies_stock SET stock = stock - $number WHERE id = $stockID";
            mysqli_query($conn, $sqlUpdatestock);
            header('Location: ../display_supplies_distribute.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_distribute.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    } else {

        header('Location: ../display_supplies_distribute.php?message=จำนวนที่แจกจ่ายเกินกว่าสินค้าคงเหลือ');
    }
} else { }
    ?>