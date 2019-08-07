<?php
    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $sqlSelect = "SELECT a.*, t.name FROM durable_material as a, durable_material_type as t";
        $sqlSelect .=" WHERE a.type = t.id and a.status = 1";
        $sqlSelect .=" and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or t.name like '%$keyword%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    }

   
?>