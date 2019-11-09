<?php
require "connection.php";

<<<<<<< HEAD
if (isset($_POST["year"])) {
    $year = $_POST["year"];
    $supplies_id = $_POST["supplies_id"];
    $productId = $_POST["product_id"];
    $unit_id = $_POST["unit_id"];
    $department = $_POST["department"];
    $distribute_date = $_POST["distribute_date"];
    $receive_from = $_POST["receive_from"];
    $distribute_to = $_POST["distribute_t  o"];
    $document_no = $_POST["document_no"];
    $baht = $_POST["baht"];
    $satang = $_POST["satang"];
    $unit = $_POST["unit"];
    $receive = $_POST["receive"];
    $distribute = $_POST["distribute"];
    $stock = $_POST["stock"];
    $flag = $_POST["flag"];



    for ($i = 0; $i < sizeof($distribute_date); $i++) {
        $disdate = $distribute_date[$i];
        $receive_from1 = $receive_from[$i];
        $distribute_to1 = $distribute_to[$i];
        $document_no1 = $document_no[$i];
        $baht1 = $baht[$i];
        $satang1 = $satang[$i];
        $unit1 = $unit[$i];
        $receive1 = $receive[$i];
        $distribute1 = $distribute[$i];
        $stock1 = $stock[$i];
        $flag1 = $flag[$i];
        // ...ต่อ
        $sql = "INSERT INTO supplies_account(year ,supplies_id , product_id, unit_id,department ,distribute_date ,receive_from , distribute_to, document_no, baht, satang, unit,receive , distribute,stock ,flag) VALUES($year , $supplies_id, $productId, $unit_id,$department ,'$disdate' ,'$receive_from1' ,'$distribute_to1',' $document_no1','$baht1' ,'$satang1 ', '$unit1',$receive1 ,$distribute1 , $stock1 ,'$flag1')";

        echo sizeof($distribute_date);


        // $sql = "INSERT INTO supplies_account(year,supplies_id,product_id ,unit_id ,department ,distribute_date ,receive_from ,distribute_to, document_no ,baht ,satang ,unit, receive ,distribute ,stock ,flag )";
        // $sql .= " VALUES( '$year' ,$supplies_id,$productId ,$unit_id , $department , '$distribute_date' , '$receive_from' ,'$distribute_to','$document_no','$baht','$satang','$unit','$receive' ,'$distribute' ,'$stock' ,'$flag' )"; 

=======
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

>>>>>>> 6accf8c5966764343d4e39fce8846bbb10c3d7db
        $log = "เพิ่มข้อมูลทะเบียนคุมวัสดุสิ้นเปลือง";
        logServer($conn, $log);

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
<<<<<<< HEAD
    // header('Location: ../display_supplies_account.php?message=เพิ่มข้อมูลสำเร็จ');
=======
    $resp["result"] = true;
    echo json_encode($resp);
>>>>>>> 6accf8c5966764343d4e39fce8846bbb10c3d7db
}
