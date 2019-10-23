<?php
    require 'connection.php';
    $asset_no = $_POST["asset_no"];
    $number = 9 ;

        $sql = "SELECT * FROM durable_material WHERE asset_no IN (";
        for ($i = 0; $i <= $number ;  $i++) { 
             $sql .= $asset_no++ ; 
             if ($i < $number) {
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
                    array_push($data, $row["asset_no"]);
                }
                $resp["data"] = $data;
            }else {
                $resp["result"] = true ;
            }
            
            echo json_encode($resp);  

            ?>      
