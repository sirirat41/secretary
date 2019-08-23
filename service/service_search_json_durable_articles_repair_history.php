<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT h.*, r.damage_id FROM durable_articles_repair_history as h, durable_articles_repair as r";
        $sqlSelect .=" WHERE h.repair_id = r.id and h.status = 1";
        $sqlSelect .=" and (r.damage_id like '%$thai%' or h.fix like '%$thai%' or h.receive_date like '%$thai%'";
        $sqlSelect .= " or r.damage_id like '%$arabic%' or h.fix like '%$arabic%' or h.receive_date like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["damage_id"] = thainumDigit($row["damage_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
