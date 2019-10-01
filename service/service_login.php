<?php
    session_start();
    $_SESSION["user_type"] = "99";
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
<<<<<<< HEAD
            } else {
=======
            }else{
                session_destroy();
            

            }else {
>>>>>>> 13361fb3a6c4c6ed66520f1545250ca69f63c900
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