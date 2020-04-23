<?php

require 'connection.php';

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];

    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT s.*, t.name ,ss.type,ss.supplies_name ,ss.stock FROM supplies as s,supplies_stock as ss , durable_material_type as t";
    $sqlSelect .= " WHERE s.supplies_id = ss.id and ss.type = t.id ";
    // $sqlSelect .=" and (s.code like '%$thai%' or s.bill_no like '%$thai%' or ss.supplies_name like '%$thai%' or t.name like '%$thai%'";
    $sqlSelect .= " and (s.code like '%$arabic%' or s.bill_no like '%$arabic%' or ss.supplies_name like '%$arabic%' or t.name like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        // $row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
    }
    echo json_encode($data);
}

?>