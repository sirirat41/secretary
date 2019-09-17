<?php
session_start();
include "service/connection.php";
// $mysqli = new mysqli('localhost','root','','secretary');
// if(isset($_post['login'])){
// $username = $_POST['username'];
// $password = $_POST['password'];
// $hasil = $mysqli->prepare("SELECT * FROM user WHERE username");
// $hasil->execute();
// $hasil->bind_result($id ,$username ,$password);
// $hasil->fetch();
// if($mysqli==$password){
//     header('Location: ../display_user.php?message=เข้าสู่ระบบสำเร็จ');
//     $_SESSION['id'] = $id;
//     $_SESSION['username'] = $username;
 
// }else{
//     echo "user and password ";
// }

// }

    $username = $_POST['username'];
    $password = $_POST['password'];
     $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
     $result = mysqli_query($con,$sql);
     $row=mysqli_num_rows($result);
 if($row <= 0){
        header('Location: ../display_user.php?message=เข้าสู่ระบบสำเร็จ');
     
     }else {
          
             if($user['u_type'] == 1)
             {
                $_SESSION['ses_id'] = session_id();
                $_SESSION['username'] = $user['username'];
                $_SESSION['u_type'] = "superadmin";
                header('Location: ../display_user.php?message=เข้าสู่ระบบสำเร็จ');

            }else if($user['u_type'] == 2) {

                $_SESSION['ses_id'] = session_id();
                $_SESSION['username'] = $user['username'];
                $_SESSION['u_type'] = "admin";
                header('Location: ../display_user.php?message=เข้าสู่ระบบสำเร็จ');
            }


         }
     

 


?>