<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display: none">insert_seller</secretary>


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
    <?php include "navigation/navbar.php";?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid">
        <!-- เริ่มเขียนโค๊ดตรงนี้ -->
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="card shado mb-6">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-store"></i> เพิ่มข้อมูลร้านค้า</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="service/service_insert_seller.php" id="form_insert">
                      <div class="row">
                          <div class="col-md-12 ">
                              <div class="form-group">
                                <label for="name">ชื่อร้านค้า</label>
                                <input type="text" class="form-control" name="name" id="inputname" aria-describedby="name" placeholder="nameseller">
                              </div>
                          </div>
                      </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="tel">เบอร์โทร</label>
                              <input type="text" class="form-control" name="tel" id="inputtel" aria-describedby="tel" placeholder="tel">
                            </div>
                        </div>
                    </div>

                  <div class="row">
                      <div class="col-md-12 ">
                          <div class="form-group">
                            <label for="fax">แฟกต์</label>
                            <input type="text" class="form-control" name="fax" id="inputfax" aria-describedby="fax" placeholder="fax">
                          </div>
                      </div>
                  </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="address">ที่อยู่</label>
                          <textarea class="form-control" name="address" id="exampleFormControlTextarea1" placeholder="address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-danger btn btn-block " data-toggle="modal" data-target="#exampleModal" >
                        บันทึก
                      <div class="ripple-container"></div></button>

                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  คุณต้องการบันทึกข้อมูลร้านค้าหรือไม่ ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="button" class="btn btn-danger"onclick="$('#form_insert').submit();">บันทึก</button>
                              </div>
                            </div>
                          </div>
                        </div>
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


</body>

</html>
