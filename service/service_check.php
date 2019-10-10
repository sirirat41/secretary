<?php
<<<<<<< HEAD
    require 'connection.php';
    $asset_no = $_POST["asset_no"];
    $number = 9 ;

        $sql = "SELECT * FROM durable_articles WHERE asset_no IN (";
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
=======
require "service/connection.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id FROM durable_articles WHERE code IN '7700-100-0001-3-2557', '7700-100-0002-3-2557', '7700-100-0003-3-2557'" ;
    $sql .= '7700-100-0004-3-2557 ', '7700-100-0005-3-2557 ','7700-100-0006-3-2557' ,'7700-100-0007-3-2557','7700-100-0008-3-2557','7700-100-0009-3-2557','7700-100-0010-3-2557'";
    $sql .= '7700-100-0011-3-2557','7700-100-0012-3-2557','7700-100-0013-3-2557','7700-100-0014-3-2557','7700-100-0015-3-2557','7700-100-0016-3-2557','7700-100-0017-3-2557','7700-100-0018-3-2557','7700-100-0019-3-2557','7700-100-0020-3-2557'";
    $result = mysqli_query($conn, $sql) or die('cannot select data');
}
>>>>>>> 22d26dd70daf4861eacb443c1231f1ce69f4da9f
