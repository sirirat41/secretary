<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seq = $_POST["seq"];
    $code = $_POST["code"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $name = $_POST["name"];
    $departmentid = $_POST["department_id"];
    $sellerid = $_POST["seller_id"];
    $price = $_POST["price"];
    $billno = $_POST["bill_no"];
    $goverment = $_POST["goverment"];
    $shortgoverment = $_POST["short_goverment"];
    $unit = $_POST["unit"];
    $status = $_POST["status"];

    $sql = "INSERT INTO supplies(seq, code, type, attribute, name, department_id, seller_id, price, bill_no, goverment, short_goverment, unit, status)";
    $sql .= " VALUES($seq, '$code', $type, '$attribute', '$name', $departmentid, $sellerid, $price, '$billno', '$goverment', '$shortgoverment', $unit, $status)";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>