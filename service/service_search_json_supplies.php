<?php

require 'connection.php';

<<<<<<< HEAD
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
=======
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $thai = thainumDigit($keyword);
    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT s.*, t.name FROM supplies as s, durable_material_type as t";
    $sqlSelect .= " WHERE s.type = t.id and s.status = 1";
    $sqlSelect .=" and (s.code like '%$thai%' or s.type like '%$thai%' or t.name like '%$thai%'";
    $sqlSelect .= " or s.code like '%$arabic%' or s.type like '%$arabic%' or t.name like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        $row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5
    }
    echo json_encode($data);
}

?>