<?php
    session_start();
    $_SESSION["user_type"] = "99";
    require 'connection.php';
    $response["result"] = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = md5($password);
            $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
            $response["sql"] = $sql;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $user = mysqli_fetch_assoc($result);
                unset($user["password"]);
                $response["result"] = true;
                $response["data"] = $user;
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_type"] = $user["u_type"];
                $_SESSION["fullname"] = $user["surname"] . " " . $user ["lastname"];
                logServer($conn, "เข้าสู่ระบบ");
            } else {
                session_destroy();
            }
        }
    } else {
        $response["result"] = false;
        $response["message"] = "Method not allow";
        session_destroy();
    }
    echo json_encode($response);
?>