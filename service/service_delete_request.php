<?php
require "connection.php";

if (isset($_GET["id"]) && isset($_POST["reason"])) {
    $id = $_GET["id"];
    $reason = $_POST["reason"];

    $sqlSelect = "SELECT * FROM supplies s, supplies_purchase ss WHERE s.id = $id and s.id = ss.product_id";
    $result = mysqli_query($conn, $sqlSelect);
    $item = mysqli_fetch_assoc($result);
    $code = $item["code"];
    $supplies_id = $item["supplies_id"];
    $departmentid = $item["department_id"];
    $seller_id = $item["seller_id"];
    $price = $item["price"];
    $billno = $item["bill_no"];
    $goverment = $item["goverment"];
    $shortgoverment = $item["short_goverment"];
    $unit = $item["unit"];
    $status = $item["status"];
    $imgeName = $item["picture"];
    $user_request = $_SESSION["user_id"];
    $action_request = "request_delete";
    $status_request = "waiting_approve";
    $order_no = $item["order_no"];
    $purchase_date = $item["purchase_date"];
    $order_by = $item["order_by"];
    $receiver = $item["receiver"];
    $receive_date = $item["receive_date"];
    $receive_address = $item["receive_address"];
    $number = $item["number"];
    $status = $item["status"];

    $sqlInsertSupplies = "INSERT INTO supplies_request(code, supplies_id , department_id,";
    $sqlInsertSupplies .= " seller_id, price, bill_no, goverment, short_goverment, unit, status, picture, user_request, reason, action_request, status_request)";
    $sqlInsertSupplies .= " VALUES('$code', $supplies_id, $departmentid, ";
    $sqlInsertSupplies .= " $seller_id, $price, '$billno', '$goverment', '$shortgoverment', $unit, $status,'$imgeName', ";
    $sqlInsertSupplies .= " $user_request, '$reason', '$action_request', '$status_request')";

    mysqli_query($conn, $sqlInsertSupplies) or die("$sqlInsertSupplies ::error => ".mysqli_error($conn));
    $productID = mysqli_insert_id($conn);

    $sqlInsertPurchase = "INSERT INTO supplies_purchase_request(product_id, order_no, purchase_date, seller_id,";
    $sqlInsertPurchase .= "order_by, receiver, receive_date, receive_address, number, status)";
    $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date', $seller_id, ";
    $sqlInsertPurchase .= " '$order_by', '$receiver', '$receive_date', '$receive_address', $number, $status)";

    mysqli_query($conn, $sqlInsertPurchase) or die("$sqlInsertPurchase ::error => ".mysqli_error($conn));
}

$resp["result"] = true;
echo json_encode($resp);

?>