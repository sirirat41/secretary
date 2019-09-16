<?php
require "connection.php";

if (isset($_GET["dep"]) && isset($_GET["item"])) {
        $dep = $_GET["dep"];
        $item = $_GET["item"];
        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
        if ($item == 1) {
                $sql = "SELECT * FROM durable_articles WHERE department_id = $dep";
        } else if ($item == 2) {
                $sql = "SELECT * FROM durable_material WHERE department_id = $dep";
        } else if ($item == 3) {
                $sql = "SELECT * FROM supplies WHERE department_id = $dep";
        }

        if ($keyword != null) {
                $sql .= " and code like '%$keyword%'";
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
