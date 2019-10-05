<?php
session_start();
if (!isset($_SESSION["user_type"])) {
  $_SESSION["user_type"] = "99";
}
require "service/connection.php";
if ($_SESSION["user_type"] == "99") {
  session_destroy();
}
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {


  $id = $_GET["id"];
    QRcode::png("http://192.168.1.92/secretary/view_qrcode_material.php?id=$id");
}
?>
