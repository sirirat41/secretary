<?php
require "connection.php";

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $sqlSelect = "SELECT a.*, t.name FROM durable_articles as a, durable_articles_type as t";
    $sqlSelect .= " WHERE a.type = t.id and a.status = 1";
<<<<<<< HEAD
    $sqlSelect .= " and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or t.name like '%$keyword%')";
=======
    $sqlSelect .= " and a.code like '%$keyword%' or a.bill_no like '%$keyword%'";
>>>>>>> 04250eaf9494e64a953ee7e422388668716fbf46
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }
<<<<<<< HEAD
    echo json_encode($data); 

}
?>
=======
    echo json_encode($data);

}

?>
>>>>>>> 04250eaf9494e64a953ee7e422388668716fbf46
