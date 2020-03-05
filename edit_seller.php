<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM seller WHERE id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display: none">display_seller</secretary>


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

    <!-- Sidebar -->
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
        <div class="col-md-6 offset-md-3">
          <div class="card shado mb-6">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger body-text"><i class="fas fa-store"></i> แก้ไขข้อมูลร้านค้า</h6>
            </div>
            <div class="card-body">
              <form method="post" action="service/service_edit_seller.php?id=<?php echo $id; ?>" id="form_insert">
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="name">ชื่อร้านค้า</label>
                      <input type="text" class="form-control body-text" name="name" id="inputname" aria-describedby="name" placeholder="" value="<?php echo $item["name"]; ?>">
                      <small id="alert-inputname" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="tel">เบอร์โทร</label>
                      <input type="text" class="form-control body-text" name="tel" id="inputtel" aria-describedby="tel" placeholder="" value="<?php echo $item["tel"]; ?>">
                      <small id="alert-inputtel" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 body-text">
                    <div class="form-group body-text">
                      <label for="fax">แฟกต์</label>
                      <input type="text" class="form-control body-text" name="fax" id="inputfax" aria-describedby="fax" placeholder="" value="<?php echo $item["fax"]; ?>">
                      <small id="alert-inputfax" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="address">ที่อยู่</label>
                      <textarea class="form-control body-text" name="address" id="address" placeholder="" rows="3"><?php echo $item["address"]; ?></textarea>
                      <small id="alert-address" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn btn-block body-text" onclick="validateData();">
                      บันทึก
                      <div class="ripple-container"></div></button>
                  </div>
                </div>
              </form>
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
    function search() {
      var kw = $("#keyword").val();
      $.ajax({
        url: 'service/service_search_json_seller.php',
        dataType: 'JSON',
        type: 'GET',
        data: {
          keyword: kw
        },

        success: function(data) {
          var tbody = $('#modal-articles-body');
          tbody.empty();
          console.log(data);
          for (i = 0; i < data.length; i++) {
            var item = data[i];
            var tr = $('<tr class="text-center"></tr>').appendTo(tbody);
            $('<td>' + item.id + '</td>').appendTo(tr);
            $('<td>' + item.damage_date + '</td>').appendTo(tr);
            $('<td>' + item.code + '</td>').appendTo(tr);
            $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" onclick="selectedArticles(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
          }
        },
        error: function(error) {
          console.log(error);
        }
      })
    }

    function selectedArticles(id) {
      $('#modal-form-search').modal('hide');
      $('#id').val(id);
    }

    function validateData() {
      var inputname = $('#inputname').val();
      var inputtel = $('#inputtel').val();
      var inputfax = $('#inputfax').val();
      var address = $('#address').val();
      var validateCount = 0;
      if ($.trim(inputname) == "") {
        validateCount++;
        $('#inputname').focus();
        $('#inputname').addClass('border border-danger');
        $('#alert-inputname').show();
      } else {
        $('#inputname').removeClass('border border-danger');
        $('#alert-inputname').hide();
      }
      if ($.trim(inputtel) == "") {
        validateCount++;
        $('#inputtel').addClass('border border-danger');
        $('#alert-inputtel').show();
      } else {
        $('#inputtel').removeClass('border border-danger');
        $('#alert-inputtel').hide();
      }
      if ($.trim(inputfax) == "") {
        validateCount++;
        $('#inputfax').addClass('border border-danger');
        $('#alert-inputfax').show();
      } else {
        $('#inputfax').removeClass('border border-danger');
        $('#alert-inputfax').hide();
      }
      if ($.trim(address) == "") {
        validateCount++;
        $('#address').addClass('border border-danger');
        $('#alert-address').show();
      } else {
        $('#address').removeClass('border border-danger');
        $('#alert-address').hide();
      }
      if (validateCount > 0) {


      } else {
        $('#exampleModal').modal();
      }
    }
  </script>

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
        คุณต้องการบันทึกข้อมูลร้านค้าหรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>