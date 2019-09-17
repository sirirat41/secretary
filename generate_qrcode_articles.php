<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {
<<<<<<< HEAD


  $id = $_GET["id"];
    QRcode::png("http://192.168.1.129/secretary/view_qrcode_articles.php?id=$id");
}
?>
=======
  $id = $_GET["id"];
    QRcode::png("http://192.168.1.129/secretary/view_qrcode_articles.php?id=$id");
}
>>>>>>> 342a5eb1483e1ba0cea832de5d590965d5a5e0a5
