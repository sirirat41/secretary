<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT r.*, a.code ,a.attribute ,a.model , a.picture ,au.Aname ,au.position ,au.rank FROM durable_articles as a,durable_articles_repair as r ,auditor as au WHERE r.id = $id";
  $sql .= " and r.damage_id = a.id ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $rank = $row["rank"];
  $Aname = $row["Aname"];
  $position = $row["position"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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


    </nav>
    <!-- End of Topbar -->


    <!-- Begin Page Content -->

    <body onLoad="window.print()">
      <div class="container-fluid">

      </div>
  </div>
  <!-- เริ่มเขียนโค๊ดตรงนี้ --><br>

  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class='border-color-gray' align="center" cellpadding="10" cellspacing="10" border="1" width="100%">
          <thead>

            <body style="padding: 16px">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12" align="center">
                    <h5>รายละเอียดการซ่อม</h5>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-7">
                  </div>
                  <div class="text " class="col-sm-">
                    <h7>ส่วนราชการ: </h7>
                  </div>
                  <div class="col-sm-3">
                    <h7>สำนักงานตำรวจแห่งชาติ</h7>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-7">
                  </div>
                  <div class="col-sm-">
                    <label class="text " for="short_goverment">
                      <div style="width:100px">
                        <h7>หน่วยงาน: </h7>
                    </label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <h7>สลก.ตร.</h7>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <label class="text " for="model">
                    <h7>รุ่นแบบ :</h7>
                  </label>
                  <?php echo ($row["model"]); ?>
                </div>
                <div class="col-sm-4">
                  <label class="text " for="code">
                    <h7>รหัสวัสดุ :</h7>
                  </label>
                  <?php echo $row["code"]; ?>
                </div>
                <div class="col-sm-4">
                  <label class="text " for="attribute">
                    <h7>คุณสมบัติ/ลักษณะ :</h7>
                  </label>
                  <?php echo ($row["attribute"]); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <label class="text " for="repair_date">
                    <h7>วันที่ซ่อม : </h7>
                  </label>
                  <?php echo ($row["repair_date"]); ?>
                </div>
                <div class="col-sm-6">
                  <label class="text " for="place">
                    <h7>สถานที่ซ่อม :</h7>
                  </label>
                  <?php echo ($row["place"]); ?>
                </div>
              </div>
                <tbody>
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
              </thead>
              </tbody>
          </table>
        <br>
        <br>
        <div class="card-body">
        <div class="row">
              <div class="col-sm-3 offset-sm-9">
                <label class="text">ตรวจแล้วถูกต้อง</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 offset-sm-8" >
                <label class="text"><?php echo $rank; ?>......................................................</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 offset-sm-9">
                <label class="text">(<?php echo $Aname; ?>)</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 offset-sm-9">
                <label class="text"><?php echo $position; ?>
                </label>
              </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  <!-- สิ้นสุดการเขียนตรงนี้ -->
  </div>
  <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

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
          <h7 class="modal-title" id="exampleModalLabel">Ready to Leave?</h7>
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

</body>

</html>