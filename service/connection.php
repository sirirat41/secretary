<?php
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
<<<<<<< HEAD
        return str_replace(array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
=======
        return str_replace(array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙"  ),
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5
        array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
        $num);
    };
?>