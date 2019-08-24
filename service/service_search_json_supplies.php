<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $sqlSelect = "SELECT s.*, t.name FROM supplies as s, durable_material_type as t";
        $sqlSelect .=" WHERE s.type = t.id and s.status = 1";
        $sqlSelect .=" and (s.code like '%$keyword%' or t.name like '%$keyword%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    }

   
?>
