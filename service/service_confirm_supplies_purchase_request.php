<?php
require "connection.php";
//Supplies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET["id"];
    $number = $_POST["number"];
    $departmentid = $_POST["department_id"];
    $sellerid = $_POST["seller_id"];
    $price = $_POST["price"];
    $billno = $_POST["bill_no"];
    $goverment = "สำนักงานตำรวจแห่งชาติ";
    $shortgoverment = $_POST["short_goverment"];
    $unit = $_POST["unit"];
    $suppliesPattern = $_POST["supplies_pattern"];
    $productID = $_POST["product_id"];
    $action_request = $_POST["action_request"];
    $status = 1;

    $log = "อนุมัติการแก้ไข";
    logServer($conn, $log);

    $sqlSelectData = "SELECT * FROM supplies WHERE code = '$productID'";
    $resultData = mysqli_query($conn, $sqlSelectData);
    $data = mysqli_fetch_assoc($resultData);
    $supID = $data["id"];
    $code = $data["code"];
    $supplies_id = $data["supplies_id"];
    $user_request = $_SESSION["user_id"];
    $reason = $_POST["reason"];
    $status_request = "approved";

    //อัฟโหลดรูปภาพ
    $imageName = $_POST["old_image"];
    if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
        $target_dir = "../uploads/";
        $imageName = $_FILES["image"]["name"];
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
    }

    //purchase
    $order_no = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $seller_id = $_POST["seller_id"];
    $order_by = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receive_address = $_POST["receive_address"];

    if ($action_request == "request_update") {
        $updateSupplies = "UPDATE supplies SET department_id = $departmentid, seller_id = $seller_id, price = $price, bill_no = '$billno', ";
        $updateSupplies .= " goverment = '$goverment', short_goverment = '$shortgoverment', unit = $unit, picture = '$imageName' ";
        $updateSupplies .= " WHERE id = $id";
    } else {
        $updateSupplies = "UPDATE supplies SET status = 0";
        $updateSupplies .= " WHERE id = $supID";
    }
    echo $updateSupplies;
    mysqli_query($conn, $updateSupplies) or die("$updateSupplies ::error => ".mysqli_error($conn));

    $sqlUpdateStatus = "UPDATE supplies_request SET action_request = '$action_request', status_request = '$status_request' WHERE id = $id";
    mysqli_query($conn, $sqlUpdateStatus) or die("$sqlUpdateStatus ::error => ".mysqli_error($conn));

    /*
    $sqlInsertPurchase = "INSERT INTO supplies_purchase_request(product_id, order_no, purchase_date, seller_id,";
    $sqlInsertPurchase .= "order_by, receiver, receive_date, receive_address, number, status)";
    $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date', $seller_id, ";
    $sqlInsertPurchase .= " '$order_by', '$receiver', '$receive_date', '$receive_address', $number, $status)";
    */

    $updatePurchase = "UPDATE supplies_purchase SET order_no = '$order_no', purchase_date = '$purchase_date', seller_id = $seller_id, ";
    $updatePurchase .= " order_by = '$order_by', receiver = '$receiver', receive_date = '$receive_date', receive_address = '$receive_address' WHERE product_id = $supID";

    mysqli_query($conn, $updatePurchase) or die("$updatePurchase ::error => ".mysqli_error($conn));

    $updateStock = "UPDATE supplies_stock SET stock = $number WHERE id = $supplies_id";
    mysqli_query($conn, $updateStock) or die("$updateStock ::error => ".mysqli_error($conn));

    header('location: ../display_supplies.php');
} else {
    header('location: ../display_supplies.php');
}
