<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $number = $_POST["number"];
        $distributedate = $_POST["distribute_date"];
        $departmentId = $_POST["department_id"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO supplies_distribute(product_id ,number ,distribute_date ,department_id , flag)";
        $sql .= " VALUES($productId, '$number', '$distributedate', $departmentId, '$flag')"; 

        
        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_supplies_distribute.php?message=เพิ่มข้อมูลสำเร็จ');
            $sqlUpdate ="UPDATE supplies SET status = 10 WHERE id = $productid";
            mysqli_query($conn ,$sqlUpdate);
        } else {
            header('Location: ../display_supplies_distribute.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    
    } else {
    
    }
    
    ?>