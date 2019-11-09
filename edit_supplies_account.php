<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM supplies_account as d ,supplies as s ,supplies_stock as ss ,department as p ,unit as u  WHERE d.department = p.id and d.unit_id = u.id and s.supplies_id = ss.id and d.product_id = s.id and d.id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $orderDate = $item["distribute_date"];
  $newOrderDate = date("Y-m-d", strtotime($orderDate));

  //item.code java odject , item["code"] php

}
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>secretary</title>
<secretary style="display : none">display_supplies_account</secretary>

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
      <div class="row ">
        <div class="col-6 offset-3">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-file-invoice-dollar"></i>
                  เพิ่มข้อมูลบัญชีคุมวัสดุ
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_edit_supplies_account.php?id=<?php echo $id; ?>" id="form_insert">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="year">ปีงบประมาณ</label>
                      <input type="text" class="form-control" name="year" id="year" placeholder="year" name="year" value="<?php echo $item["year"]; ?>">
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-group bmd-form-group">
                      <label for="supplies_id">ชื่อวัสดุ</label>
                      <input type="text" class="form-control" name="supplies_name" id="supplies_name" placeholder="supplies_name" name="supplies_name" value="<?php echo $item["supplies_name"]; ?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label for="product_id">รหัสวัสดุ</label>
                      <input type="text" class="form-control" name="code" id="code" placeholder="code" name="code" value="<?php echo $item["code"]; ?>" readonly> 
                        </div>
                  </div>
                </div>
                <div class="row">


                  <div class="col-4">
                    <div class="form-group bmd-form-group">
                      <label for="unit_id">หน่วยนับ</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="name" name="name" value="<?php echo $item["name"]; ?>" readonly> 
                        </div>
                    </div>
             
                  <div class="col-8">
                    <div class="form-group bmd-form-group">
                      <label for="department">หน่วยงานที่เก็บ</label>
                      <input type="text" class="form-control" name="department" id="department" placeholder="department" name="department" value="<?php echo $item["fullname"]. " ".$item["bulding"]. " ".$item["floor"]; ?>" readonly> 
                        </div>

                    </div>
                  </div>
           
                <br>



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
                        <td rowspan="2">วัน/เดือน/ปี</td>
                        <td rowspan="2">รับจาก</td>
                        <td rowspan="2">จ่ายให้</td>
                        <td rowspan="2">เลขที่เอกสาร</td>
                        <td colspan="2" width="15%" height="10">ราคาต่อหน่วย</td>
                        <td rowspan="2">หน่วยนับ</td>
                        <td colspan="3">จำนวน</td>
                        <td rowspan="2">หมายเหตุ</td>
                      </tr class="text-center">
                      <tr class="text-center">
                        <td width="10%">บาท </td>
                        <td>สต.</td>
                        <td width="7%">รับ</td>
                        <td width="7%">จ่าย</td>
                        <td width="7%">คงเหลือ</td>
                      </tr>
                    </thead>
                    <thead>
                      <tr class="text-center" height="30" id="firstTr">

                        <td> <input type="date" class="form-control" name="distribute_date" id="distribute_date" placeholder="" name="distribute_date" value="<?php echo $orderDate; ?>"></td>
                        <td> <input type="text" class="form-control" name="receive_from" id="receive_from" placeholder="" name="receive_from" value="<?php echo $item["receive_from"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="distribute_to" id="distribute_to" placeholder="" name="distribute_to" value="<?php echo $item["distribute_to"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="document_no" id="document_no" placeholder="" name="document_no" value="<?php echo $item["document_no"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="baht" id="baht" placeholder="" name="baht" value="<?php echo $item["baht"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="satang" id="satang" placeholder="" name="satang" value="<?php echo $item["satang"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="unit" id="unit" placeholder="" name="unit" value="<?php echo $item["unit"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="receive" id="receive" placeholder="" name="receive" value="<?php echo $item["receive"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="distribute" id="distribute" placeholder="" name="distribute" value="<?php echo $item["distribute"]; ?>"></td>
                        <td> <input type="text" class="form-control" name="stock" id="stock" placeholder="" name="stock" value="<?php echo $item["stock"]; ?>"></td>
                        <td><input type="text" class="form-control" name="flag" id="flag" placeholder="" name="flag" value="<?php echo $item["flag"]; ?>"></td>
                      </tr>

                    </thead>
                  </table>
                  <br>
                  <table width="500" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <button id="addRow" type="button">+</button>
                        <button id="removeRow" type="button">-</button>

                      </td>
                    </tr>
                  </table>
                </div>

                <br>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn btn-block" data-toggle="modal" data-target="#exampleModal">
                      ตกลง
                    </button>
                    <!-- Modal -->

                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      </form>
      <br>
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
          <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>