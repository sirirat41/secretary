<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Articles

    $number = $_POST["number"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $bill_no = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $department_id = $_POST["department_id"];
    $money_type = $_POST["money_type"];
    $acquiring = $_POST["acquiring"];
    $asset_no = $_POST["asset_no"];
    $assetNoArray = explode(",", $asset_no);
    $d_gen = $_POST["d_gen"];
    $seller_id = $_POST["seller_id"];
    $goverment = "สำนักงานตำรวจแห่งชาติ";
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $short_goverment = $_POST["short_goverment"];
    //$picture = $_POST["picture"];
    $durable_year = $_POST["durable_year"];
    $storage = $_POST["storage"];
    $articles_pattern = $_POST["articles_pattern"];
    $status = 1;
    $bookNo = $_POST["book_no"];

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
<<<<<<< HEAD
=======
=======
    $target_dir = "../uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    }
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148

>>>>>>> c183e5d70595e70acab932f81c8874c9651bce8e
    //purchase

    $order_no = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $seller_id = $_POST["seller_id"];
    $order_by = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receive_address = $_POST["receive_address"];

    $pattern = convertPattern($articles_pattern);
    $sqlCheck = "SELECT * FROM durable_articles WHERE code like '$pattern'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $numberBefore = mysqli_num_rows($resultCheck);

    for ($i = 0; $i < $number; $i++) {

        $seq = $i + 1;
        $code = "";
        if ($numberBefore > 0) {
            $len = substr_count($pattern, "_");
            $replacement = "";
            for ($j = 0; $j < $len; $j++) {
                $replacement .= "_";
            }
            $newCode = str_replace($replacement, autoRun(++$numberBefore, $len), $pattern);
        } else {
            $len = substr_count($pattern, "_");
            $replacement = "";
            for ($j = 0; $j < $len; $j++) {
                $replacement .= "_";
            }
            $newCode = str_replace($replacement, autoRun($seq, $len), $pattern);
        }

        $sqlInsertArticles = "INSERT INTO durable_articles ( seq, code, type, attribute, model, bill_no, budget, department_id, money_type ,";
        $sqlInsertArticles .= " acquiring, asset_no, d_gen, seller_id, goverment, unit, price, short_goverment, durable_year, storage, status , book_no, picture)";
        $sqlInsertArticles .= " VALUES($seq,'$newCode', $type, '$attribute', '$model', '$bill_no', '$budget', $department_id ,";
        $sqlInsertArticles .= " '$money_type', '$acquiring', '$assetNoArray[$i]', '$d_gen', $seller_id, '$goverment', $unit, ";
        $sqlInsertArticles .= " $price, '$short_goverment', $durable_year, '$storage', $status , '$bookNo','$imgeName')";
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
        $sqlInsertArticles .= " acquiring, asset_no, d_gen, seller_id, goverment, unit, price, short_goverment, durable_year, storage, status , book_no, picture)";
        $sqlInsertArticles .= " VALUES($seq,'$newCode', $type, '$attribute', '$model', '$bill_no', '$budget', $department_id ,";
        $sqlInsertArticles .= " '$money_type', '$acquiring', '$assetNoArray[$i]', '$d_gen', $seller_id, '$goverment', $unit, ";
        $sqlInsertArticles .= " $price, '$short_goverment', $durable_year, '$storage', $status , '$bookNo', '$imageName')";
<<<<<<< HEAD
=======
=======
        $sqlInsertArticles .= " acquiring, asset_no, d_gen, seller_id, goverment, unit, price, short_goverment, durable_year, storage, status ,book_no ,picture)";
        $sqlInsertArticles .= " VALUES($seq,'$newCode', $type, '$attribute', '$model', '$bill_no', '$budget', $department_id ,";
        $sqlInsertArticles .= " '$money_type', '$acquiring', '$assetNoArray[$i]', '$d_gen', $seller_id, '$goverment', $unit, ";
        $sqlInsertArticles .= " $price, '$short_goverment', $durable_year, '$storage', $status , '$bookNo' , '$imageName')";
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
>>>>>>> c183e5d70595e70acab932f81c8874c9651bce8e

        echo $sqlInsertArticles;
        mysqli_query($conn, $sqlInsertArticles) or die(mysqli_error($conn));
        $productID = mysqli_insert_id($conn);

        $sqlInsertPurchase = "INSERT INTO durable_articles_purchase (product_id, order_no, purchase_date, seller_id, order_by, receiver, receive_date, receive_address, number, status)";
        $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date' , $seller_id, '$receiver', '$order_by', '$receive_date', '$receive_address', $number, $status)";

        mysqli_query($conn, $sqlInsertPurchase) or die(mysqli_error($conn));;
    }

   header('location: ../display_durable_articles.php');
} else {
    header('location: ../display_durable_articles.php');
}

function convertPattern($pattern)
{
    $len = substr_count($pattern, "{");
    for ($i = 0; $i < $len; $i++) {
        $posA = strpos($pattern, "{");
        $posB = strpos($pattern, "}");
        $founded = substr("$pattern", $posA, 7);
        $command = str_replace("{", "", $founded);
        $command = str_replace("}", "", $command);
        $command = explode("_", $command);
        if (count($command) == 2) {
            $runTotal = $command[1];
            $underNum = "";
            for ($j = 0; $j < $runTotal; $j++) {
                $underNum .= "_";
            }
            $pattern = str_replace($founded, $underNum, $pattern);
        } else { }
    }
    return $pattern;
}
function autoRun($current, $format)
{
    $auto = "";
    $diff = $format - strlen($current);

    for ($i = 0; $i < $diff; $i++) {
        $auto .= "0";
    }
    $auto .= $current;
    return $auto;
}
