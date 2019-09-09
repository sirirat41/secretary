<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c183e5d70595e70acab932f81c8874c9651bce8e
  $id = $_GET["id"];
    QRcode::png("http://192.168.1.129/secretary/view_qrcode_articles.php?id=$id");
}
?>
<<<<<<< HEAD

=======
=======
<<<<<<< HEAD
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
    $id = $_GET["id"];
QRcode::png("http://192.168.1.178/secretary/view_qrcode_articles.php?id=$id");

}
<<<<<<< HEAD
=======
=======
  $id = $_GET["id"];
  QRcode::png("http://192.168.1.213/secretary/view_qrcode_articles.php?id=$id");

}
?>
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
>>>>>>> c183e5d70595e70acab932f81c8874c9651bce8e
