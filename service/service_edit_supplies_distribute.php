<?php 
require 'connection.php';
if(isset($_GET["id"])) {
    //supplies_diatribute data
    $id = $_GET["id"];
    $number = $_POST["number"];
    $product_id = $_POST["product_id"];
    $distributeDate = $_POST["distribute_date"];
    $departmentId = $_POST["department_id"];


    $type = $_GET["type"];
    
    $log = "แก้ไขข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $id ;
    logServer($conn, $log);

    $sqlSelect = "SELECT * FROM supplies_distribute WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE supplies SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updatesupplies = "UPDATE supplies SET status = 10";
    $updatesupplies .= " WHERE id = $product_id";
    mysqli_query($conn, $updatesupplies) or die("Cannot update supplies_distribute: " . mysqli_error($conn));

    $updatesupplies = "UPDATE supplies_distribute SET number = $number,";
    $updatesupplies .= " product_id = '$product_id', distribute_date = '$distributeDate', department_id = $departmentId";
    $updatesupplies .= " WHERE id = $id";
    mysqli_query($conn, $updatesupplies) or die("Cannot update supplies_distribute: " . mysqli_error($conn));

    header('Location: ../display_supplies_distribute.php?type='.$type.'&messagee=แก้ไขข้อมูลสำเร็จ');
}
?>