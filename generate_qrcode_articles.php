<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {
<<<<<<< HEAD
    $id = $_GET["id"];
QRcode::png("http://192.168.1.45/secretary/view_qrcode_articles.php?id=$id");

}
=======
  $id = $_GET["id"];
  QRcode::png("http://192.168.1.46/secretary/view_qrcode_articles.php?id=$id");

}
?>
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
