<?php

require 'connection.php';

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $thai = thainumDigit($keyword);
    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT s.*, t.name ,ss.type,ss.supplies_name FROM supplies as s,supplies_stock as ss , durable_material_type as t";
    $sqlSelect .= " WHERE s.supplies_id = ss.id and ss.type = t.id ";
    $sqlSelect .=" and (s.code like '%$thai%' or ss.supplies_name like '%$thai%'";
    $sqlSelect .= " or s.code like '%$arabic%' or ss.supplies_name like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        //$row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
    }
    echo json_encode($data);
}

?>