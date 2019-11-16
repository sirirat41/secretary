<?php
require "connection.php";

if (isset($_POST["body"])) {
    $body = $_POST["body"];
    //supplies_diatribute data
    $id = $_GET["id"];
    $product_id = $_POST["product_id"];
    $supplies_id = $_POST["supplies_id"];
    $unit_id = $_POST["unit_id"];
    $department = $_POST["department"];
    $year = $_POST["year"];
    // $distribute_date = $_POST["distribute_date"];
    // $receive_from = $_POST["receive_from"];
    // $distribute_to = $_POST["distribute_to"];
    // $document_no = $_POST["document_no"];
    // $baht = $_POST["baht"];
    // $satang = $_POST["satang"];
    // $unit = $_POST["unit"];
    // $receive = $_POST["receive"];
    // $distribute = $_POST["distribute"];
    // $stock = $_POST["stock"];
    // $flag = $_POST["flag"];





    // $sqlaccount = "SELECT * FROM supplies_account as d ,supplies as s ,supplies_stock as ss ,department as p ,unit as u  WHERE d.department = p.id and d.unit_id = u.id and s.supplies_id = ss.id and d.product_id = s.id and d.id = $id";
    // $result = mysqli_query($conn, $sqlaccount);
    // $row = mysqli_fetch_assoc($result);



    // $updatesupplies = "UPDATE supplies_account SET year = $year,";
    // $updatesupplies .= " product_id = '$product_id',supplies_id = '$supplies_id',unit_id = '$unit_id',department = '$department',distribute_date = '$distribute_date', receive_from = '$receive_from', distribute_to = '$distribute_to',document_no = '$document_no',baht = '$baht', satang = '$satang', unit = '$unit', receive = '$receive', distribute = '$distribute', stock = '$stock', flag = '$flag'";
    // $updatesupplies .= " WHERE id = $id";

    for ($i = 0; $i < sizeof($body); $i++) {
        $item = $body[$i];
        $account_id = isset($item["id"]) ? $item["id"] : null;
        $distribute_date = $item["distribute_date"];
        $receive_from = $item["receive_from"];
        $distribute_to = $item["distribute_to"];
        $document_no = $item["document_no"];
        $baht = $item["baht"];
        $satang = $item["satang"];
        $unit = $item["unit"];
        $receive = $item["receive"];
        $distribute = $item["distribute"];
        $stock = $item["stock"];
        $flag = $item["flag"];

        if ($account_id == null) {
            $updatesupplies = "INSERT INTO supplies_account(year ,supplies_id , product_id, unit_id,department ,distribute_date ,receive_from , distribute_to, document_no, baht, satang, unit,receive , distribute,stock ,flag) VALUES($year , $supplies_id, $productId, $unit_id,$department ,'$disdate' ,'$receive_from1' ,'$distribute_to1',' $document_no1','$baht1' ,'$satang1 ', '$unit1',$receive1 ,$distribute1 , $stock1 ,'$flag1')";
        } else {
            $updatesupplies = "UPDATE supplies_account SET year = $year,";
            $updatesupplies .= " product_id = '$product_id',supplies_id = '$supplies_id',unit_id = '$unit_id',department = '$department',distribute_date = '$distribute_date', receive_from = '$receive_from', distribute_to = '$distribute_to',document_no = '$document_no',baht = '$baht', satang = '$satang', unit = '$unit', receive = '$receive', distribute = '$distribute', stock = '$stock', flag = '$flag'";
            $updatesupplies .= " WHERE id = $account_id";
        }

        $log = "แก้ไขข้อมูลmtทะเบียนคุมวัสดุสิ้นเปลือง รหัส " . $id;
        logServer($conn, $log);

        mysqli_query($conn, $updatesupplies) or die(mysqli_error($conn));
    }
    //header('Location: ../display_durable_articles_repair.php?message=เพิ่มข้อมูลสำเร็จ');
    $resp["result"] = true;
    echo json_encode($resp);
}
