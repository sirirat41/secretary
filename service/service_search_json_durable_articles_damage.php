<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT d.*, a.code ,a.attribute , a.model FROM durable_articles_damage as d, durable_articles as a";
        $sqlSelect .= " WHERE d.product_id = a.id and d.status = 1";
        $sqlSelect .=" and (a.code like '%$thai%' or d.damage_date like '%$thai%'";
        $sqlSelect .= " or a.code like '%$arabic%' or d.damage_date like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["product_id"] = thainumDigit($row["product_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
