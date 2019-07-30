<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display: none">Display_durable_material_purchase</secretary>

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

  <?php include "navigation/navbar.php";?>


        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid">
        <!-- เริ่มเขียนโค๊ดตรงนี้ -->
          <div class="row">
              <div class="col-md-8 offset-2">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-file-invoice-dollar"></i> เพิ่มข้อมูลการจัดซื้อ(วัสดุคงทน)</h6>
                            </div>
                          
                          <div class="card-body">
                          <form method="post" action="service/service_insert_durable_material_purchase.php" id="form_insert">
                                <div class="row">
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <label for="order_no">เลขที่ใบสั่งซื้อ</label>
                                          <input type="text" class="form-control" name="order_no" id="order_no" placeholder="no" autofocus>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                     <label for="purchase_date" >วันที่จัดซื้อ</label>
                                      <input type="datetime-local" class="form-control" name="purchase_date" id="purchase_date" placeholder="purchase_date">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12 ">
                                  <div class="form-group ">
                                 <label for="order_by" >ชื่อผู้จัดซื้อ</label>
                                  <input type="text" class="form-control" name="order_by" id="order_by" placeholder="name">
                                </div>
                              </div>
                          </div>
                              <div class="row">
                                <div class="col-md-8 ">
                                  <div class="form-group">
                                 <label for="product_id">รหัสวัสดุ</label>
                                  <input type="text" class="form-control" name="product_id" id="product_id" placeholder="id">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                               <label for="number" >จำนวน</label>
                                <input type="text" class="form-control" name="number" id="number" placeholder="number">
                              </div>
                          </div>
                            </div>
                        <div class="row">
                          <div class="col-md-8 ">
                            <div class="form-group ">
                           <label for="receiver" >ชื่อผู้รับ</label>
                            <input type="text" class="form-control" name="receiver" id="receiver" placeholder="name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                         <label for="receive_date" >วันที่ตรวจรับ</label>
                          <input type="datetime-local" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group ">
                     <label for="receive_address" >สถานที่จัดส่ง</label>
                     <textarea class="form-control" name="receive_address" id="receive_address" rows="2" placeholder="address"></textarea>
                    </div>
                  </div>
              </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group ">
                                <label for="seller_id" >ข้อมูลร้านที่สั่ง</label>
                                <select class="form-control" name="seller_id">
                                  <option value ="1">1</option>
                                  <option value ="2">2</option>
                                  <option value ="3">3</option>
                                  <option value ="4">4</option>
                                  <option value ="5">5</option>
                                </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                      <button type="button" class="btn btn-danger btn-md btn-block" aria-pressed="false" autocomplete="off" data-toggle="modal" data-target="#exampleModal">
                          บันทึก
                        </button>
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
                                  คุณต้องการบันทึกข้อมูลการจัดซื้อวัสดุใช่หรือไม่
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                  <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
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
</body>

</html>
