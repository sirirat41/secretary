<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $sql = "INSERT INTO unit(name)";
    $sql .= " VALUES('$name')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>