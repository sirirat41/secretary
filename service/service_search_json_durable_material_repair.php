<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        $thai = thainumDigit($keyword);
        $arabic = arabicnumDigit($keyword);
        $sqlSelect = "SELECT r.*, a.code ,a.attribute , a.name FROM durable_material_repair as r, durable_material as a";
        $sqlSelect .= " WHERE r.damage_id = a.id and r.status = 1";
        $sqlSelect .=" and (a.code like '%$thai%' or a.model like '%$thai%'";
        $sqlSelect .= " or a.code like '%$arabic%' or a.model like '%$arabic%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            $row["damage_id"] = thainumDigit($row["damage_id"]);
            array_push($data, $row);
            
        }
        echo json_encode($data);
    }

   
?>
