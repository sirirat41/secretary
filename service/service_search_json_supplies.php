<?php

    require 'connection.php';

    if (isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $sqlSelect = "SELECT m.* FROM supplies ";
        $sqlSelect .=" WHERE m.type = m.status = 1";
        $sqlSelect .=" and (m.code like '%$keyword%' or m.bill_no like '%$keyword%')";
        $data = array();
        $result = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    }

   
?>
