<?php
require "connection.php";

if (isset($_GET["id"]) && isset($_POST["reason"])) {
    $id = $_GET["id"];
    $reason = $_POST["reason"];
    $sql = "UPDATE supplies_request SET status_request = 'rejected', reject = '$reason' WHERE id = $id";
    mysqli_query($conn, $sql);
//        $row["rejected"] = thai($row["rejected"]);
//             $row["bill_no"] = thainumDigit($row["bill_no"]);
}

$resp["result"] = true;
echo json_encode($resp);

?>