<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display : none">insert_suplies_distribute</secretary>

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
        <br>
        <div class="row ">
        <div class="col-8 offset-2" >
            <div class="card">
                <div class="card-header card-header-text card-header-danger">
                  <div class="card-text">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-fw fa-paper-plane"></i>
                        แจกจ่ายวัสดุ
                    </h6>
                  </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="row" >
                      <div class=" col-6 " >
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">รหัสวัสดุ</label>
                              <input class="form-control" type="text" placeholder="product_id">
                            </div>
                      </div>
                          <div class="col-6">
                                <div class="form-group bmd-form-group">
                                  <label class="bmd-label-floating">รหัสหน่วยงาน</label>
                                  <input class="form-control" type="text" placeholder="department_id">
                                </div>
                          </div>
                        </div>
                        <div class="row" >
                          <div class=" col-6 " >
                                <div class="form-group bmd-form-group">
                                  <label class="bmd-label-floating">วันที่แจกจ่าย</label>
                                  <input class="form-control" type="text" placeholder="distribute_date">
                                </div>
                          </div>
                              <div class="col-6">
                                    <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating">จำนวน</label>
                                      <input class="form-control" type="text" placeholder="number">
                                    </div>
                              </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12" >
                                <button type="button" class="btn btn-danger btn btn-block " data-toggle="modal" data-target="#exampleModal" >
                                    ตกลง
                                  </button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body ">
                                          คุณต้องการบันทึกข้อมูลแจกจ่าย(วัสดุ)หรือไม่ ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                          <button type="button" class="btn btn-danger">บันทึก</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                           
                            </div>
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