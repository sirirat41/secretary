<?php
require "connection.php";

if(isset($_GET["id"])) {
    //supplies_diatribute data
    $id = $_GET["id"];
    $year = $_POST["year"];
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



      
        
        $sqlaccount = "SELECT * FROM supplies_account as d ,supplies as s ,supplies_stock as ss ,department as p ,unit as u  WHERE d.department = p.id and d.unit_id = u.id and s.supplies_id = ss.id and d.product_id = s.id and d.id = $id";
        $result = mysqli_query($conn, $sqlaccount);
        $row = mysqli_fetch_assoc($result);
        
        $log = "แก้ไขข้อมูลmtทะเบียนคุมวัสดุสิ้นเปลือง รหัส " . $id ;
        logServer($conn, $log);
     
        $updatesupplies = "UPDATE supplies_account SET year = $year,";
        $updatesupplies .= " distribute_date = '$distribute_date', receive_from = '$receive_from', distribute_to = '$distribute_to',document_no = '$document_no',baht = '$baht', satang = '$satang', unit = '$unit', receive = '$receive', distribute = '$distribute', stock = '$stock', flag = '$flag'";
        $updatesupplies .= " WHERE id = $id"; 
        if (mysqli_query($conn, $updatesupplies) or die("Cannot update unit: " . mysqli_error($conn))) {
            header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    
    } else {
    
    }
    
    ?>