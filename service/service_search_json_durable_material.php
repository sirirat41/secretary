<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $sqlSelect = "SELECT m.*, t.name FROM durable_material as m, durable_material_type as t";
        $sqlSelect .=" WHERE m.type = t.id and m.status = 1";
        $sqlSelect .=" and (m.code like '%$keyword%' or m.bill_no like '%$keyword%' or t.name like '%$keyword%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    }

   
?>
