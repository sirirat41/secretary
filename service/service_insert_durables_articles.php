<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $seq = $_POST["seq"] ;
    $code = $_POST["code"];
    $type = 1;
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $bill_no = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $department_id = 1;
    $money_type = $_POST["money_type"];
    $acquiring = $_POST["acquiring"];
    $asset_no = $_POST["asset_no"];
    $d_gen = $_POST["d_gen"];
    $seller_id = 1;
    $goverment	 ="สำนักงานตำรวจแห่งชาติ";
    $unit = 1;
    $price = $_POST["price"];
    $short_goverment = $_POST["short_goverment"];
    //$picture = $_POST["picture"];
    $durable_year = $_POST["durable_year"];
    $storage = $_POST["storage"];
    $status = 1;

    $sql = "INSERT INTO durable_articles (seq, code, type, attribute, model, bill_no, budget, department_id, money_type, acquiring, asset_no,
    d_gen, seller_id, goverment, unit, price, short_goverment, durable_year, storage, status)";

    $sql .= " VALUES($seq, '$code', $type, '$attribute', '$model', '$bill_no', '$budget', $department_id, '$money_type', '$acquiring', 
    '$asset_no', '$d_gen', $seller_id, '$goverment',  $unit, $price, '$short_goverment' ,$durable_year, '$storage', $status )";

    if (mysqli_query($conn, $sql)){
        echo "Insert data complete";
    }else{
        echo "Can't insert data, please check this:" . mysqli_error($conn);
    }

}else{
    echo "name" ;
}


?>