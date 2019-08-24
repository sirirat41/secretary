<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $thai = thainumDigit($keyword);
<<<<<<< HEAD
        $arabic = arabicnumDigit ($keyword);
        $sqlSelect = "SELECT a.*, t.name FROM durable_articles as a, durable_articles_type as t";
        $sqlSelect .=" WHERE a.type = t.id and a.status = 1";
        $sqlSelect .=" and (a.code like '%$thai%' or a.bill_no like '%$thai%' or t.name like '%$thai%'";
        $sqlSelect .=" or a.code like '%$arabic%' or a.bill_no like '%$arabic%' or t.name like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["code"] =  thainumDigit($row["code"]);
            $row["bill_no"] =  thainumDigit($row["bill_no"]);
=======
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT a.*, t.name FROM durable_articles as a, durable_articles_type as t";
        $sqlSelect .=" WHERE a.type = t.id and a.status = 1";
        $sqlSelect .=" and (a.code like '%$thai%' or a.bill_no like '%$thai%' or t.name like '%$thai%'";
        $sqlSelect .= " or a.code like '%$arabic%' or a.bill_no like '%$arabic%' or t.name like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["code"] = thainumDigit($row["code"]);
            $row["bill_no"] = thainumDigit($row["bill_no"]);
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5
            array_push($data, $row);

        }
        echo json_encode($data);
    }

   
?>
