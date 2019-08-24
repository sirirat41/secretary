<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT * FROM durable_articles_damage d, durable_articles a";
        $sqlSelect .=" WHERE d.product_id = a.id and d.status = 1";
        $sqlSelect .=" and (d.product_id like '%$thai%' or d.damage_date like '%$thai%'";
        $sqlSelect .= " or d.product_id like '%$arabic%' or d.damage_date like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["product_id"] = thainumDigit($row["product_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
