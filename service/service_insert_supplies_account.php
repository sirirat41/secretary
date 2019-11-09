<?php
require "connection.php";

if (isset($_POST["body"])) {
    $body = $_POST["body"];
    $year = $body["year"];
    $supplies_id = $body["supplies_id"];
    $productId = $body["product_id"];
    $unit_id = $body["unit_id"];
    $department = $body["department"];

    for ($i = 0; $i < sizeof($body["data"]); $i++) {
        $item = $body["data"][$i];
        $disdate = $item["distribute_date"];
        $receive_from1 = $item["receive_from"];
        $distribute_to1 = $item["distribute_to"];
        $document_no1 = $item["document_no"];
        $baht1 = $item["baht"];
        $satang1 = $item["satang"];
        $unit1 = $item["unit"];
        $receive1 = $item["receive"];
        $distribute1 = $item["distribute"];
        $stock1 = $item["stock"];
        $flag1 = $item["flag"];

        $sql = "INSERT INTO supplies_account(year ,supplies_id , product_id, unit_id,department ,distribute_date ,receive_from , distribute_to, document_no, baht, satang, unit,receive , distribute,stock ,flag) VALUES($year , $supplies_id, $productId, $unit_id,$department ,'$disdate' ,'$receive_from1' ,'$distribute_to1',' $document_no1','$baht1' ,'$satang1 ', '$unit1',$receive1 ,$distribute1 , $stock1 ,'$flag1')";

        $log = "เพิ่มข้อมูลทะเบียนคุมวัสดุสิ้นเปลือง";
        logServer($conn, $log);

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลสำเร็จ');
    $resp["result"] = true;
    echo json_encode($resp);
}
