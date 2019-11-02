<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT m.*, t.name FROM durable_material as m, durable_material_type as t";
        $sqlSelect .=" WHERE m.type = t.id and ";
        $sqlSelect .=" and (m.code like '%$thai%' or m.bill_no like '%$thai%' or t.name like '%$thai%'";
        $sqlSelect .= " or m.code like '%$arabic%' or m.bill_no like '%$arabic%' or t.name like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            // $row["code"] = thainumDigit($row["code"]);
            // $row["bill_no"] = thainumDigit($row["bill_no"]);
            array_push($data, $row);
        }
        echo json_encode($data);
    }

   
?>
