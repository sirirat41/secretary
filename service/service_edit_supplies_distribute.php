<?php 
require 'connection.php';
if(isset($_GET["id"])) {
    //supplies_diatribute data
    $id = $_GET["id"];
    $number = $_POST["number"];
    $distributeDate = $_POST["distribute_date"];
    $departmentId = $_POST["department_id"];

    
    $sqlstock = "SELECT * FROM supplies_stock as ss ,durable_material_type as t, supplies as s ,supplies_distribute as d WHERE s.supplies_id = ss.id and ss.type = t.id ";
    $result = mysqli_query($conn, $sqlstock);
    $row = mysqli_fetch_assoc($result);
    $stockID = $row["id"];
    $type = $row["type"];
    
    $log = "แก้ไขข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $id ;
    logServer($conn, $log);

    $updatesupplies = "UPDATE supplies_distribute SET number = $number,";
    $updatesupplies .= " distribute_date = '$distributeDate', department_id = $departmentId";
    $updatesupplies .= " WHERE id = $id";
    mysqli_query($conn, $updatesupplies) or die("Cannot update supplies: " . mysqli_error($conn));

    header('Location: ../display_supplies_distribute copy.php?id='.$type.'&messagee=แก้ไขข้อมูลสำเร็จ');
}
?>