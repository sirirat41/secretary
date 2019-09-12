<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {
<<<<<<< HEAD
=======
  $id = $_GET["id"];
    QRcode::png("http://192.168.1.129/secretary/view_qrcode_articles.php?id=$id");
}
?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 711c67d207dd5d7beab72cb64726ed797dd1e118


  $id = $_GET["id"];
    QRcode::png("http://192.168.1.129/secretary/view_qrcode_articles.php?id=$id");
}
?>
<<<<<<< HEAD

=======
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
>>>>>>> c183e5d70595e70acab932f81c8874c9651bce8e
>>>>>>> 9d913d549e01055493e8573fb3c8d2d506612026
>>>>>>> 711c67d207dd5d7beab72cb64726ed797dd1e118
