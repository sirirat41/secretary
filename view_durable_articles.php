<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT a.*, t.name as durable_articles_type_name ,un.name as unit_name, se.name as seller_name, d.shortname ,d.fullname FROM durable_articles as a ,durable_articles_type as t , seller as se , department as d , unit as un WHERE a.id = $id";
  $sql .= " and a.type = t.id and a.seller_id = se.id and a.department_id = d.id and a.unit = un.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // $depPerYear = ($row["price"] - 1) / $row["durable_year"];
  // $depPerMouth = $depPerYear / 12;
  // echo "year :" . +number_format((float) $depPerYear, 2, '.', '') . "<br>";
  // echo "mouth :" . +number_format((float) $depPerMouth, 2, '.', '');


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

  <title>Dashboard</title>
  <secretary style="display: none">display_durable_articles</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">
  <link href="qrcode/qrlib.php" rel="stylesheet">
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
        <div class="col-md-10 offset-1">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-business-time"></i> ข้อมูลครุภัณฑ์</h6>
                <form class="form-inline">
                  <div>
                    <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-QR">
                      <i class="fas fa-qrcode"></i>
                    </button>
                    
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
                      <label class="text-dark" for="fullname">หน่วยงานที่รับผิดชอบ : </label>
                      <?php echo $row["fullname"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="shortname">หน่วยงาน (ย่อ) : </label>
                      <?php echo $row["shortname"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="code">รหัส : </label>
                      <?php echo $row["code"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="asset_no">เลขสินทรัพย์ : </label>
                      <?php echo $row["asset_no"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="type">ประเภทครุภัณฑ์ : </label>
                      <?php echo $row["durable_articles_type_name"]; ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark" for="model">รุ่นแบบ : </label>
                      <?php echo $row["model"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                      <?php echo $row["attribute"]; ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark" for="unit">หน่วยนับ : </label>
                      <?php echo $row["unit_name"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="bill_no">เลขที่ใบเบิก : </label>
                      <?php echo $row["bill_no"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="budget">งบประมาณ : </label>
                      <?php echo $row["budget"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="d_gen">เอกสารสำรองเงิน : </label>
                      <?php echo $row["d_gen"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="book_no">เลขที่หนังสือ : </label>
                      <?php echo $row["book_no"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="seller_id">ชื่อผู้ขาย : </label>
                      <?php echo $row["seller_name"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="price">จำนวนเงิน : </label>
                      <?php echo $row["price"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="durable_year">จำนวนปีครุภัณฑ์ : </label>
                      <?php echo $row["durable_year"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="storage">ห้องเก็บครุภัณฑ์ : </label>
                      <?php echo $row["storage"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="money_type">ประเภทเงิน : </label>
                      <?php echo $row["money_type"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="acquiring">วิธีการได้มา : </label>
                      <?php echo $row["acquiring"]; ?>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="py-3">
            <nav class="navbar navbar-light bg-light">
              <h6 class="m-0 font-weight-bold text-danger">
                <i class="fas fa-business-time"></i> ค่าเสื่อมรายปี</h6>
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
  
  <div class="modal fade" id="modal-QR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"];?> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
          <img src="generate_qrcode_articles.php?id=<?php echo $id; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <a href="generate_qrcode_articles.php?id=<?php echo $id; ?>" class="btn btn-primary" 
          style="color: white; cursor: pointer" download>ดาวโหลด</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>