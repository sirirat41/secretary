<?php
require "connection.php";

if (isset($_GET["item"])) {
        $item = $_GET["item"];
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        if ($item != null) {
                $sql = "SELECT * FROM supplies WHERE type = $item";
       
        }

        if ($keyword != null) {
                $sql .= " and name like '%$keyword%'";
        }

        $result = mysqli_query($conn, $sql);
        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {
                array_push($response, $row);
        }
        echo json_encode($response);
} else {
        echo 'ไม่ส่งตัวแปรมา';
}
