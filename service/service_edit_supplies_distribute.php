<?php
require 'connection.php';
if (isset($_GET["id"])) {
    //supplies_diatribute data
    $id = $_GET["id"];
    $number = $_POST["number"];
    $product_id = $_POST["product_id"];
    $distributeDate = $_POST["distribute_date"];
    $departmentId = $_POST["department_id"];

    $type = $_GET["type"];

    $log = "แก้ไขข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง";
    logServer($conn, $log);
    $sqlSelect = "SELECT d.*,s.supplies_id ,s.code FROM supplies_distribute as d , supplies as s WHERE d.id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $numberold = $dataOld["number"];
    $suppliesid = $dataOld["supplies_id"];
    $product_id_old = $dataOld["product_id"];

    // $sqlSelect1 = "SELECT * FROM supplies_stock WHERE id = $id";
    // $resultOld1 = mysqli_query($conn, $sqlSelect1);
    // $dataOld1 = mysqli_fetch_assoc($resultOld1);
    // $stock = $dataOld1["stock"];

    // $updateOld = "UPDATE supplies SET status = 1 WHERE id = $oldProductID";
    // mysqli_query($conn, $updateOld);
    if ($product_id != $product_id_old) {
        $sqlRestore = "UPDATE supplies_stock SET stock = stock + $numberold WHERE id = $suppliesid";
        mysqli_query($conn, $sqlRestore);
    }

    if ($product_id == $product_id_old) {
        if ($number < $numberold) {
            $total =  $numberold - $number;
            // $stocknew = $total - $stock;

            $sqlUpdate = "UPDATE supplies_stock SET stock = stock + $total WHERE id = $suppliesid";
            mysqli_query($conn, $sqlUpdate);
        } else {
            $total = $number - $numberold;
            // $total = $number - $numberold;
            // $stocknew = $total + $stock;
            $sqlUpdate1 = "UPDATE supplies_stock SET stock = stock - $total WHERE id = $suppliesid";
            mysqli_query($conn, $sqlUpdate1);
        }
    } else {
        $sqlNewOne = "SELECT * FROM supplies WHERE id = $product_id";
        $resultNewOne = mysqli_query($conn, $sqlNewOne);
        $dataNewOne = mysqli_fetch_assoc($resultNewOne);
        $newSuppliesId = $dataNewOne["supplies_id"];
        $total = $number;
        // $total = $number - $numberold;
        // $stocknew = $total + $stock;
        $sqlUpdate1 = "UPDATE supplies_stock SET stock = stock - $total WHERE id = $newSuppliesId";
        mysqli_query($conn, $sqlUpdate1) or die("die: ".$sqlUpdate1);
    }


    $updatesupplies = "UPDATE supplies_distribute SET number = $number,";
    $updatesupplies .= " product_id = '$product_id', distribute_date = '$distributeDate', department_id = $departmentId";
    $updatesupplies .= " WHERE id = $id";
    mysqli_query($conn, $updatesupplies) or die("Cannot update supplies_distribute: " . mysqli_error($conn));

    header('Location: ../display_supplies_distribute.php?type=' . $type . '&messagee=แก้ไขข้อมูลสำเร็จ');
}
