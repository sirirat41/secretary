<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $shortname = $_POST["shortname"];

        $sql = "INSERT INTO durable_material_type(name,shortname )";
        $sql .= " VALUES('$name', '$shortname')"; 

        
        if (mysqli_query($conn, $sql)) {
            echo "Insert data complete";
        } else {
            echo "Can't insert data, please check this:" . mysqli_error($conn);
        }

} else {


}
?>