<?php
    session_start();
    require 'connection.php';
    $response["result"] = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
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
     

            }

        }
    } else {
        $response["result"] = false;
        $response["message"] = "Method not allow";
    }
    echo json_encode($response);
?>