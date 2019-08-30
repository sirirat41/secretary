<?php

require 'connection.php';

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $thai = thainumDigit($keyword);
    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT * FROM seller";
    $sqlSelect .= " WHERE status = 1";
    $sqlSelect .=" and (name like '%$thai%' or address like '%$thai%'";
    $sqlSelect .= " or name like '%$arabic%' or address like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        $row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
    }
    echo json_encode($data);
}

?>