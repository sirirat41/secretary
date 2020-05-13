<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit ($keyword);
        $sqlSelect = "SELECT a.*, t.name FROM durable_articles as a, durable_articles_type as t";
        $sqlSelect .=" WHERE a.type = t.id and a.status != 0 and a.status != 2 and a.status != 3 and a.status != 4 and a.status != 8 and a.status != 9 and a.status != 7";
        $sqlSelect .=" and (a.code like '%$thai%' or a.bill_no like '%$thai%' or t.name like '%$thai%'";
        $sqlSelect .=" or a.code like '%$arabic%' or a.bill_no like '%$arabic%' or t.name like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){

            array_push($data, $row);

        }
        echo json_encode($data);
    }

   
?>
