
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display: none">index</secretary>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">
  <style>
    body {
      background-color: #880000;
    }

  </style>
</head>


<body style="padding: 150px">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-4 offset-4">
          <div class="card border-warning shadow mb-6 ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger text-center">
                <i class="fas fa-user-lock"></i> เข้าสู่ระบบ</h6>
            </div>

            <div class="card-body">
              <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                <div class="row">
                  <div class="col-md-10 offset-1">
                    <div class="form-group">
                      <input type="text" class="form-control" name="username" id="username" placeholder="username" autofocus>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 offset-1">
                    <div class="form-group">


                      <input type="password" class="form-control" name="password" id="password" placeholder="password">
                      <div class="text-right">
                        <a href="#">ลืมรหัสผ่าน?</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10 offset-1">
                    <button type="button" href="#" id="btn-login" class="btn btn-danger btn-md btn-block">
                      เข้าสู่ระบบ
                    </button>
                    <hr color="red">
                    <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <a href="#">สมัครสมาชิก</a>
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
  <footer class="sticky-footer">
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
    $('#btn-login').on('click', function() {
      $.ajax({
        url: "service/service_login.php",
        dataType: "JSON",
        type: "POST",
        data: {
          username: $('#username').val(),
          password: $('#password').val()
        },
        success: function(response) {
          if (response.result) {
            window.location = "display_durable_articles.php";
          } else {
            alert('username หรือ password ผิด');
          }
        },
        error: function(error) {
          console.log(error);
          alert('ไม่สามารถ Login ได้ กรุณาลองอีกครั้ง');
        }
      })
    })
  </script>
</body>

</html>