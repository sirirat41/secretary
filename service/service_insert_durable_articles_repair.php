<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seq = $_POST["seq"];
    $damageid = $_POST["damage_id"];
    $repairdate = $_POST["repair_date"];
    $place = $_POST["place"];

    $sql = "INSERT INTO durable_articles_repair(seq, `damage_id`, `repair_date`, `place`)";
    $sql .= " VALUES($seq, $damageid, '$repairdate', '$place')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>