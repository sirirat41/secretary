<?php
require 'connection.php';
if (isset($_POST["password1"])) {
    $id = $_SESSION["user_id"];
    // echo "รหัสผ่านเก่า".$password . "<br>" ;
    // echo "รหัสผ่านใหม่".$password1;
    $password1 = str_split($_POST["password1"]);
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql) or die('cannot select data');
    $item = mysqli_fetch_assoc($result);

    $passworddatabase = $item["password"];
    $isupper = 0;
    $islower = 0;
    $isnumber = 0;
    // echo sizeOf($password1);

    if (sizeOf($password1) >= 6) {
        foreach ($password1 as $cha) {
            if (ctype_upper($cha)) {
                $isupper++;
            } else if (ctype_lower($cha)) {
                $islower++;
            } else if (is_numeric($cha)) {
                $isnumber++;
            }
        }
        $password1 = md5($_POST["password1"]);
        // $array = str_split($password1);
        if ($password != $password1) {

            if ($isupper > 0 && $islower > 0 && $isnumber > 0) {
                $sql = "UPDATE user SET password = '$password1'";
                $sql .= " WHERE id = $id";

                // echo $password1;
                mysqli_query($conn, $sql) or die("Cannot update password" . mysqli_error($conn));
                header('location: service_logout.php');
            } else {
                header('Location: ../edit_password.php?กรุณาใส่ตัวอักษรตัวเล็ก ใหญ่ และตัวเลข ให้ครบตามที่กำหนด');
            }
        } else {
            header('Location: ../edit_password.php?edit_password.php?รหัสผ่านใหม่ตรงกับรหัสผ่านเดิม กรุณากรอกใหม่');
        }
    } else {
        echo ('กรุณาใส่รหัสผ่านให้ครบ 6 ตัว');
        header('Location: ../edit_password.php?edit_password.php?กรุณาใส่รหัสผ่านให้ครบ 6 ตัว');
    }
    // header('location: service_logout.php');
}
