<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $bookno = $_POST["book_no"];
        $permitdate = $_POST["permit_date"];
        $receivedate = $_POST["receive_date"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO supplies_permits(product_id ,book_no ,permit_date ,receive_date, flag)";
        $sql .= " VALUES($productId, '$bookno' , '$permitdate', '$receivedate', '$flag')"; 

        
        if (mysqli_query($conn, $sql)) {
            echo "Insert data complete";
        } else {
            echo "Can't insert data, please check this:" . mysqli_error($conn);
        }

} else {


}
?>