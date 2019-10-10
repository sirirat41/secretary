<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user_type"])) {
    header('location: index.php'); 
}
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");

    function thainumDigit($num){
        return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
        array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
        $num);
    };

    function arabicnumDigit($num){
        return str_replace(array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
        array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
        $num);
    };

    function logServer($conn ,$action) {
        $userID = $_SESSION["user_id"];
        $sql = "INSERT INTO log(user_id, action) VALUES($userID ,'$action')";
        mysqli_query($conn ,$sql);
    }
    function month($month){
        return str_replace(array( '01' , '02' , '03' , '04' , '05' , '06' , '07' ,'08' , '09' , '10' , '11' , '12' ),
        array( 'ม.ค.' , 'ก.พ.' , 'มี.ค.' , 'เม.ษ.' , 'พ.ค.' , 'มิ.ย.' , 'ก.ค.' ,'ส.ค.' , 'ก.ย.' , 'ต.ค.', 'พ.ย.' , 'ธ.ค.' ),
        $month);
    };

?>