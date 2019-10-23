<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"];
    $supplies_id = $_POST["supplies_id"];
        $productId = $_POST["product_id"];
        $unit_id = $_POST["unit_id"];
        $department = $_POST["department"];
        $distribute_date = $_POST["distribute_date"];
        $receive_from = $_POST["receive_from"];
        $distribute_to = $_POST["distribute_to"];
        $document_no = $_POST["document_no"];
        $baht = $_POST["baht"];
        $satang = $_POST["satang"];
        $unit = $_POST["unit"];
        $receive = $_POST["receive"];
        $distribute = $_POST["distribute"];
        $stock = $_POST["stock"];
        $flag = $_POST["flag"];



        $sql = "INSERT INTO supplies_account(year,supplies_id,product_id ,unit_id ,department ,distribute_date ,receive_from ,distribute_to, document_no ,baht ,satang ,unit, receive ,distribute ,stock ,flag )";
        $sql .= " VALUES( '$year' ,$supplies_id,$productId ,$unit_id , $department , '$distribute_date' , '$receive_from' ,'$distribute_to','$document_no','$baht','$satang','$unit','$receive' ,'$distribute' ,'$stock' ,'$flag' )"; 
       
        $log = "เพิ่มข้อมูลทะเบียนคุมวัสดุสิ้นเปลือง";
        logServer($conn, $log);

        if (mysqli_query($conn, $sql) or die("Cannot update unit: " . mysqli_error($conn))) {
            header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    
    } else {
    
    }
    
    ?>