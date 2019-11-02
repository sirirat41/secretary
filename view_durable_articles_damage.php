<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT da.*, a.code ,a.picture ,a.attribute ,a.model FROM durable_articles_damage as da ,durable_articles as a WHERE da.id = $id";
  $sql .= " and da.product_id = a.id and da.status = 1 ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
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
  <secretary style="display: none">display_durable_articles_damage</secretary>

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
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-fw fa-house-damage"></i> ข้อมูลชำรุด (ครุภัณฑ์)</h6>
                <form class="form-inline">
                  <div>
                </form>
            </div>
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
                      <label class="text-dark" for="code">รหัสครุภัณฑ์ : </label>
                      <?php echo thainumDigit ($row["code"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                      <?php echo thainumDigit($row["attribute"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="model">รุ่นแบบ : </label>
                      <?php echo thainumDigit($row["model"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="damage_date">วันที่ชำรุด : </label>
                      <?php echo thainumDigit($row["damage_date"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="flag">หมายเหตุ : </label>
                      <?php echo thainumDigit($row["flag"]); ?>
                    </div>
                  </div>
                </div>
          </form>
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

</body>

</html>