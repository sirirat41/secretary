<?php
require "connection.php";
if (isset($_GET["dep"]) && isset($_GET["item"])) {
    $dep = $_GET["dep"];
    $item = $_GET["item"];
    $sql = "SELECT * FROM department";
    $sql .= " WHERE id = $dep";

        switch ($_GET['item']) {
            case "1":
                alert("articles.php");
                break;
            case "2":
                alert("material.php");
                break;
            case "3":
                alert("supplies.php");
                break;
            default:
                alert("department.php");
                break;
        }
    }

