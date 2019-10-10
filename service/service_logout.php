<?php
session_start();
require 'connection.php';
logServer($conn, "ออกจากระบบ");
session_destroy();
header("Location: ../index.php");
exit;
?>
