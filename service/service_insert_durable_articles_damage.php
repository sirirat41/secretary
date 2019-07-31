<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["product_id"];
    $damagedate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_damage(product_id, damage_date, flag)";
    $sql .= " VALUES($productid, '$damagedate', '$flag')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>