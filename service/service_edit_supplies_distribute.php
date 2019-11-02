<?php 
require 'connection.php';
if(isset($_GET["id"])) {
    //supplies_diatribute data
    $id = $_GET["id"];
    $number = $_POST["number"];
    $distributeDate = $_POST["distribute_date"];
    $departmentId = $_POST["department_id"];


    $type = $_GET["type"];
    
    $log = "แก้ไขข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $id ;
    logServer($conn, $log);

    $updatesupplies = "UPDATE supplies_distribute SET number = $number,";
    $updatesupplies .= " distribute_date = '$distributeDate', department_id = $departmentId";
    $updatesupplies .= " WHERE id = $id";
    mysqli_query($conn, $updatesupplies) or die("Cannot update supplies: " . mysqli_error($conn));

    header('Location: ../display_supplies_distribute.php?type='.$type.'&messagee=แก้ไขข้อมูลสำเร็จ');
}
?>