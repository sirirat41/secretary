<?php
    require 'connection.php';
    $code = $_POST["code"];
    $number = 9 ;

        $sql = "SELECT * FROM durable_articles WHERE code IN (";
        for ($i = 0; $i < $number; $i++) { 
            $sql .= $code; 
            if ($numberBefore > 0) {
               $sql .= ","; 
            }
       }
           $sql .= ")"; 
           $result = mysqli_query($conn, $sql);
           $found = mysqli_num_rows($result);
           if ($found > 0) {
               $resp["result"] = false;
               $data = array();
               while($row = mysqli_fetch_assoc($result)) {
                   array_push($data, $row["code"]);
               }
               $resp["data"] = $data;
           }else {
               $resp["result"] = true ;
           }
           
           echo json_encode($resp);  

           ?>      