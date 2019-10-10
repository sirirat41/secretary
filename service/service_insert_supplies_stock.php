<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $supplies_name = $_POST["supplies_name"];
        $stock = $_POST["stock"];
        $type = $_POST["type"];
        $attribute = $_POST["attribute"];


    
            // $sqlsupplies = "INSERT INTO supplies_stock(product_id ,supplies_name ,stock )";
            // $sqlsupplies .= " VALUES($productId, '$supplies_name', $stock)"; 

            $sqlsupplies = "INSERT INTO supplies_stock(supplies_name  ,type ,attribute)";
            $sqlsupplies .= " VALUES('$supplies_name', $type ,'$attribute')"; 

     $log = "เพิ่มข้อมูลชื่อวัสดุสิ้นเปลือง";
    logServer($conn, $log);

            if (mysqli_query($conn, $sqlsupplies)) {
        header('location: ../display_supplies_stock.php');
    } else {
        header('location: ../display_supplies_stock.php');
   
    }

} else {

}
    ?>