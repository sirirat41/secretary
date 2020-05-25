<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$_SESSION["user_type"] = "99";
require 'connection.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

if ($_POST["email"]) {
    $email = $_POST["email"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $surname = $row["surname"];
        $lastname = $row["lastname"];
        $id = $row["id"];

        $admin = "secretarypolice19@gmail.com";
        $password = "mjf120711";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;
            $mail->Username   = $admin;
            $mail->Password   = $password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;     
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom($admin, 'Secretary Administrator');
            $mail->addAddress($email, $username);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'แจ้งเตือนการเปลี่ยนรหัสผ่าน';
         //   $mail->Body    = "สวัสดีคุณ $surname หากต้องการแก้ไขรหัสผ่านของท่านในระบบ Secretary กรุณา <a href='http://localhost: /secretary/confirmpassword.php?id=$id&email=$email'>คลิกที่นี่</a>";
            $mail->Body    = "สวัสดีคุณ $surname หากต้องการแก้ไขรหัสผ่านของท่านในระบบ Secretary กรุณา <a href='http://material.secretary.police.go.th/confirmpassword.php?id=$id&email=$email'>คลิกที่นี่</a>";

            $mail->send();

            $log = "ลืมรหัสผ่าน " . $username ;
            logServer($conn, $log);
            header('location: ../index.php');
           
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        session_destroy();
    }
}
