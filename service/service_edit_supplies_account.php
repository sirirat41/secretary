<?php
require "connection.php";

if (isset($_POST["body"])) {
    $body = $_POST["body"];
    //supplies_diatribute data
    $id = $_GET["id"];
    $product_id = $body["product_id"];
    // $supplies_id = $body["supplies_id"];
    $unit_id = $body["unit_id"];
    $department = $body["department"];
    $year = $body["year"];
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



    $updatesupplies = "UPDATE supplies_account SET year = $year,";
    $updatesupplies .= " unit_id = '$unit_id',department = '$department'";
    $updatesupplies .= " WHERE id = $id";
    mysqli_query($conn, $updatesupplies) or die(mysqli_error($conn));

     $data = $body["data"];
    for ($i = 0; $i < sizeof($data); $i++) {
        $item = $data[$i];
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
        $total = $item["stock"];


        if ($account_id == null) {
            if ($distribute_date == "" && $receive_from == "" && $distribute_to == "" && $document_no == "" && $baht == "" && $satang == "" && $unit == "" && $receive == "" && $distribute == "" && $stock == "" && $flag == "") {
                continue;
            }
            $stock = $stock == "" ? 0 : $stock;
            $distribute = $distribute == "" ? 0 : $distribute;
            $receive = $receive == "" ? 0 : $receive;
            $stock = $receive - $distribute;
            $updatesupplies = "INSERT INTO supplies_account_detail(account_id ,distribute_date ,receive_from , distribute_to, document_no, baht, satang, unit,receive , distribute,stock ,flag) VALUES($id ,'$distribute_date' ,'$receive_from' ,'$distribute_to',' $document_no','$baht' ,'$satang', '$unit','$receive' ,'$distribute' , '$stock' ,'$flag')";
     
           
            
        //     $sqlNewOne = "SELECT a.*,d.receive ,d.distribute ,d.stock ,d.account_id ,a.id as idd ,d.id as did FROM supplies_account as a , supplies_account_detail as d ,supplies as s WHERE d.id = $account_id and d.account_id = $id and a.product_id = s.id and a.status = 1";
        //     echo "select : " . $sqlNewOne . "<br>";
        //     $resultNewOne = mysqli_query($conn, $sqlNewOne);
        //     $dataNewOne = mysqli_fetch_assoc($resultNewOne);
        //     $detailID = $dataNewOne["idd"];
        //     $receiveold = $dataNewOne["receive"];
        //     $distributeold = $dataNewOne["distribute"];
        //     $stockold = $dataNewOne["stock"];
        //     $account_idd = $dataNewOne["did"];
        //    $updatesupplies = "UPDATE supplies_account_detail SET receive = $receive + $stockold";
        //     $updatesupplies .= " WHERE id = $account_idd";
         
        //    echo $account_id;
        } else {
            $updatesupplies = "UPDATE supplies_account_detail SET distribute_date = '$distribute_date',";
            $updatesupplies .= " receive_from = '$receive_from', distribute_to = '$distribute_to',document_no = '$document_no',baht = '$baht', satang = '$satang', unit = '$unit', receive = '$receive', distribute = '$distribute', stock = '$receive' - distribute , flag = '$flag'";
            $updatesupplies .= " WHERE id = $account_id";
            
           
        }
        // $updatesupplies = "UPDATE supplies_account_detail SET stock = '$receive' - distribute ";
        // $updatesupplies .= " WHERE id = $account_id";
     
        mysqli_query($conn, $updatesupplies) or die(mysqli_error($conn));
    }  
         $log = "แก้ไขข้อมูลทะเบียนคุมวัสดุสิ้นเปลือง";
        logServer($conn, $log);
    //header('Location: ../display_durable_articles_repair.php?message=เพิ่มข้อมูลสำเร็จ');
    $resp["result"] = true;
    echo json_encode($resp);
}
