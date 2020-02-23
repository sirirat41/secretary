<?php
require "service/connection.php";
if (isset($_GET["type"]) && isset($_GET["page"]) && $_GET["type"] == "fix") {
    $page = $_GET["page"];
    if (strpos($page, "-") == true) {
        $exp = explode("-", $page);
        $start = $exp[0] -1;
        $count = $exp[1] - $start;
        $sql = "SELECT * FROM durable_articles Order by id LIMIT $start, $count";
    } else if (strpos($page, ",") == true) {
        $exp = explode(",", $page);
        $dataArr = array();
        $sql = "";
        for ($i = 0; $i < sizeOf($exp); $i++) {
            if ($sql != "") {
                $sql .= " union (SELECT * FROM durable_articles LIMIT " . ($exp[$i] - 1) . " , 1)";
            } else {
                $sql .= "(SELECT * FROM durable_articles LIMIT " . ($exp[$i] - 1) . " , 1)";
            }
        }
    } else {
        $page -= 1; // $page = $page - 1;
        $sql = "SELECT * FROM durable_articles Order by id LIMIT $page, 1";
    }
} else {
    $sql = "SELECT * FROM durable_articles Order by id";
}
$result = mysqli_query($conn, $sql);
$numberOfArticles = mysqli_num_rows($result);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Generate All QRCode Articles</title>


</head>

<body>

    <div class="container-fluid">
        <?php if (isset($_GET["type"]) && isset($_GET["page"])) {; ?>
            <?php if ($_GET["type"] == "all") {; ?>
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-3" align="center" style="padding: 10px; border: 1px solid black">
                            <img src="generate_qrcode_articles.php?id=<?php echo $row["id"]; ?>" style="width: 100%">
                            <div style="margin-top: -20px"><small><?php echo $row["code"]; ?></small></div>
                        </div>
                    <?php }; // end of while all 
                    ?>
                </div>
            <?php }; // end of check type all 
            ?>
            <?php if ($_GET["type"] == "fix") {; ?>
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-3" align="center" style="padding: 10px; border: 1px solid black">
                            <img src="generate_qrcode_articles.php?id=<?php echo $row["id"]; ?>" style="width: 100%">
                            <div style="margin-top: -20px"><small><?php echo $row["code"]; ?></small></div>
                        </div>
                    <?php }; // end of while all 
                    ?>
                </div>
            <?php }; // end of check type all 
            ?>
        <?php }; // end of isset 
        ?>
    </div>

    <div class="modal fade" id="modal-config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
                </div>
                <form action="generate_all_qrcode_articles.php" method="GET">
                    <div class="modal-body">
                        <h3><?php echo $numberOfArticles; ?> รายการ</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type" value="all" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                ปริ้นทั้งหมด
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="fix" value="fix">
                            <label class="form-check-label" for="exampleRadios2">
                                ปริ้นรายการที่
                            </label>
                            <input id="page" class="form-control form-control-sm" type="text" name="page" placeholder="ตัวอย่างเช่น1-5" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger body-text">ยืนยัน</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            <?php if (!isset($_GET["type"]) || !isset($_GET["page"])) { ?>

                $('#modal-config').modal({
                    backdrop: 'static',
                    keyboard: false
                })
            <?php } else {
                echo 'onload = window.print();';
            }; ?>
            $('#fix').on('change', function() {
                $('#page').removeAttr('disabled');
            })
            $('#type').on('change', function() {
                $('#page').attr('disabled', true);
            })
            $('form').on('submit', function(e) {
                $('#page').removeAttr('disabled');
            })
        })
    </script>
</body>

</html>