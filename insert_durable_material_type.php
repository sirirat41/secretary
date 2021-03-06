<?php
require "service/connection.php";
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
  <secretary style="display: none">display_durable_material_type</secretary>

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
        <div class="col-md-6 offset-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger body-text">
                <i class="fas fa-clipboard-list"></i> เพิ่มข้อมูลประเภทวัสดุ</h6>
            </div>

            <div class="card-body">
              <form method="post" action="service/service_insert_durable_material_type.php" id="form_insert">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="name">ชื่อประเภทวัสดุ</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="" autofocus>
                      <small id="alert-name" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="shortname">ชื่อย่อ</label>
                      <input type="text" class="form-control" name="shortname" id="shortname" placeholder="">
                      <small id="alert-shortname" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="status">สถานะ</label>
                      <input type="number" class="form-control" name="status" id="status" placeholder="">
                      <small style="color: red"> * 1 = วัสดุคงทน  </small><br>
                      <small style="color: red"> * 2 = วัสดุสิ้นเปลือง</small>
                      <small id="alert-status" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn-md btn-block body-text" aria-pressed="false" autocomplete="off" onclick="validateData();">
                      บันทึก
                    </button>

                  </div>
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
      <?php
      if (isset($_GET["message"])) {
        $message = $_GET["message"];
        echo "$('#modal-message').modal();";
      }
      ?>
    })

    function validateData() {
      var name = $('#name').val();
      var shortname = $('#shortname').val();
      var status = $('#status').val();
      var validateCount = 0;
      if ($.trim(name) == "") {
        validateCount++;
        $('#name').focus();
        $('#name').addClass('border border-danger');
        $('#alert-name').show();
      } else {
        $('#name').removeClass('border border-danger');
        $('#alert-name').hide();
      }
      if ($.trim(shortname) == "") {
        validateCount++;
        $('#shortname').addClass('border border-danger');
        $('#alert-shortname').show();
      } else {
        $('#shortname').removeClass('border border-danger');
        $('#alert-shortname').hide();
      }
      if ($.trim(status) == "") {
        validateCount++;
        $('#status').addClass('border border-danger');
        $('#alert-status').show();
      } else {
        $('#status').removeClass('border border-danger');
        $('#alert-status').hide();
      }
      if (validateCount > 0) {


      } else {
        $('#exampleModal').modal();
      }
    }
  </script>
  <!-- Message Modal-->
  <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $_GET["message"]; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger body-text" data-dismiss="modal">ตกลง</button>

        </div>
      </div>
    </div>
  </div>

</body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-text">
        คุณต้องการบันทึกข้อมูลประเภทวัสดุใช่หรือไม่
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>