<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT d.*, m.code FROM durable_articles_damage as d, durable_articles as m";
        $sqlSelect .= " WHERE d.product_id = m.id ";
        $sqlSelect .=" and (m.code like '%$thai%' or d.damage_date like '%$thai%'";
        $sqlSelect .= " or m.code like '%$arabic%' or d.damage_date like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["product_id"] = thainumDigit($row["product_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
