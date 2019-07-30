<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $fax = $_POST["fax"];
    $address = $_POST["address"];

    $sql = "INSERT INTO seller(name, tel, fax, address)";
    $sql .= " VALUES('$name', '$tel', '$fax', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>