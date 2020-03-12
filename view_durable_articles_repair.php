<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT r.*, m.code ,m.attribute , m.model,d.product_id FROM durable_articles_repair as r, durable_articles_damage as d,durable_articles as m";
  $sql .= " WHERE r.damage_id = d.id and d.product_id = m.id and r.status = 1 and r.id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $damageID = $row["damage_id"];
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta model="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta model="description" content="">
  <meta model="author" content="">

  <title>secretary</title>
  <secretary style="display: none">display_durable_articles_repair</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "navigation/navbar.php"; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row ">
        <p class="" onclick="window.history.back()" style="cursor: pointer">
          <i class="fas fa-angle-left"></i> กลับ
        </p>
      </div>
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger body-text">
                  <i class="fas fa-wrench"></i> ข้อมูลการซ่อม(ครุภัณฑ์)</h6>
            </div>
            </nav>
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card" style="width: 200px;">
                      <img class="img-thumbnail" src="uploads/<?php echo $row["picture"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
             
                    <div class="row">
                      <div class="col-md-12">
                        <label class="text-dark body-text" for="damage_id">รหัสครุภัณฑ์ : </label>
                        <?php echo ($row["code"]); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="text-dark body-text" for="repair_date">วันที่ซ่อม : </label>
                        <?php echo ($row["repair_date"]); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="text-dark body-text" for="place">สถานที่ซ่อม : </label>
                        <?php echo ($row["place"]); ?>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 card" style="padding: 10px" align="center">
              <h4>ประวัติการซ่อม </h4>
              <hr>
              <div id="history_log">

              </div>
              <p id="label_empty_history">ครุภัณฑ์ ชิ้นนี้ไม่มีประวัติการซ่อม</p>
              </div>

              </div>
      </div>
    </div>
    <br>
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class='border-color-gray' align="center" cellpadding="10" cellspacing="10" border="1" width="100%" id="myTbl">
                <thead>
                  <tr class="text-center">
                    <td rowspan="2">ลำดับ</td>
                    <td rowspan="2">เลขระยะทางเมื่อเข้าซ่อม</td>
                    <td rowspan="2">รายการซ่อม</td>
                    <td colspan="2" width="15%" height="10">จำนวนเงิน</td>
                    <td rowspan="2">สถานที่ซ่อม</td>
                    <td rowspan="2">วันตรวจรับ</td>
                    <td rowspan="2">หมายเหตุ</td>
                  </tr class="text-center">
                  <tr class="text-center">
                    <td width="8%">บาท </td>
                    <td width="6%">สตางค์</td>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $sqlSelect = "SELECT * FROM durable_articles_repair_history as h";
                  $sqlSelect .= " WHERE h.repair_id = " . $_GET["id"];
                  //echo $sqlSelect;
                  $result = mysqli_query($conn, $sqlSelect);
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"]
                  ?>
                    <tr class="text-center" height="30" id="firstTr">
                      <td> <input type="hidden" class="form-control history_id" placeholder="" value="<?php echo $row["id"]; ?>"><?php echo $row["seq"]; ?></td>
                      <td> <?php echo $row["mileage_number"]; ?></td>
                      <td> <?php echo $row["fix"]; ?></td>
                      <td> <?php echo $row["baht"]; ?></td>
                      <td> <?php echo $row["satang"]; ?></td>
                      <td> <?php echo $row["place"]; ?></td>
                      <td> <?php echo $row["receive_date"]; ?></td>
                      <td> <?php echo $row["flag"]; ?></td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <br>
            </div>
                </div>
          </div>
        </div>
      </div>
    <!-- สิ้นสุดการเขียนตรงนี้ -->
  </div>
  <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>By &copy; Sirirat Napaporn Bongkotchaporn</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/secretary.js"></script>
  <script>
      $(document).ready(function() {
        checkDamageHistory(<?php echo $damageID;?>);

        

    })
  function checkDamageHistory(pid) {
// alert('00');

      var history = $('#history_log');
      $.ajax({
        url: 'service/service_get_item_repair_history.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
          id: pid
        },
        success: function(data) {
          if (data.length > 0) {
            console.log(data);
            $('#label_empty_history').hide();
            history.empty();
            history.show();
            addHeaderHistory();
            for (i = 0; i < data.length; i++) {
              var ele = data[i];
              var body = '<div class="row"><div class="col-md-2">' + (i + 1) + '</div><div class="col-md-4">' + (ele.repair_date) + '</div><div class="col-md-6">' + (ele.flag) + '</div></div>';
              $(body).appendTo(history);
            }
          } else {
            $('#label_empty_history').show();
            history.hide();
            console.log(data);
          }
        },
        error(error) {
          console.error(error);
          $('#label_empty_history').show();
          history.hide();
        }
      })
    }

    function addHeaderHistory() {
      var history = $('#history_log');
      var header = '<div class="row"><div class="col-md-2"><b>ครั้งที่</b></div><div class="col-md-4"><b>วันที่ซ่อม</b></div><div class="col-md-6"><b>สาเหตุที่ซ่อม</b></div></div><hr>';
      $(header).appendTo(history)
    }
  </script>
</body>

</html>