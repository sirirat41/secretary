<?php
    require 'connection.php';
    $asset_no = $_POST["asset_no"];
    $resp["asset_no"] = $asset_no;

        $sql = "SELECT * FROM durable_articles a, durable_material m WHERE a.asset_no = '$asset_no' or m.asset_no = '$asset_no'";
            $result = mysqli_query($conn, $sql);
            $found = mysqli_num_rows($result);
            if ($found > 0) {
                $resp["result"] = false;
            }else {
                $resp["result"] = true ;
            }
            
            echo json_encode($resp);  

            ?>