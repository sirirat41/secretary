<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $shortname = $_POST["shortname"];
    $owner = $_POST["owner"];
    $bulding = $_POST["bulding"];
    $floor = $_POST["floor"];

    $sql = "INSERT INTO department(fullname, shortname, owner, bulding, floor)";
    $sql .= " VALUES('$fullname', '$shortname', '$owner', '$bulding', '$floor')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>