<?php

require 'connection.php';

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $thai = thainumDigit($keyword);
    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT * FROM supplies_stock ";
    $sqlSelect .= " WHERE status = 1";
    $sqlSelect .=" and (stock like '%$thai%' or supplies_name like '%$thai%'";
    $sqlSelect .= " or stock like '%$arabic%' or supplies_name like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        // $row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
    }
    echo json_encode($data);
}

?>