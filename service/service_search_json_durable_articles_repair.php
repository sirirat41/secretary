<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT r.*, d.product_id FROM durable_articles_repair as r, durable_articles_damage as d";
        $sqlSelect .=" WHERE r.damage_id = d.id and r.status = 1";
        $sqlSelect .=" and (r.seq like '%$thai%' or r.place like '%$thai%' or d.product_id like '%$thai%'";
        $sqlSelect .= " or r.seq like '%$arabic%' or r.place like '%$arabic%' or d.product_id like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["seq"] = thainumDigit($row["seq"]);
            $row["product_id"] = thainumDigit($row["product_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
