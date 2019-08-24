<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $number = $_POST["number"];
        $distributedate = $_POST["distribute_date"];
        $departmentId = $_POST["department_id"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO supplies_distribute(product_id ,number ,distribute_date ,department_id , flag)";
        $sql .= " VALUES($productId, '$number', '$distributedate', $departmentId, '$flag')"; 

        
        if (mysqli_query($conn, $sql)) {
            echo "Insert data complete";
        } else {
            echo "Can't insert data, please check this:" . mysqli_error($conn);
        }

} else {


}
?>