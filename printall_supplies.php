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
  <secretary style="display: none">display_supplies</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">
  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
  </style>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- End of Topbar -->


    <!-- Begin Page Content -->

    <body onLoad="window.print()">
      <div class="container-fluid">

      </div>
  </div>

  <body style="padding: 16px">

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table width="100%" border="1" class="landscape">
              <h6 class="m-3 font-weight-bold " align="center">ข้อมูลการแจกจ่าย(วัสดุสิ้นเปลือง)</h6>
              <form>
                <thead>
                  <tr class="text-center">
                   
                    <th>
                      <font size="2">เลขที่ใบเบิก</font>
                    </th>
                    <th>
                      <font size="2">รหัสวัสดุ</font>
                    </th>
                    <th>
                      <font size="2">ประเภท</font>
                    </th>
                    <th>
                      <font size="2">รายการ</font>
                    </th>
                    <th>
                      <font size="2">ลักษณะ/คุณสมบัติ</font>
                    </th>
                    <th>
                      <font size="2">หน่วยนับ</font>
                    </th>
                  
                    <th>
                      <font size="2">หน่วยงานที่รับผิดชอบ</font>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sqlSelect = "SELECT s.* , d.fullname ,un.name ,ss.supplies_name ,ss.type,ss.attribute ,t.name as tname FROM supplies as s, durable_material_type as t, department as d, unit as un ,supplies_stock as ss";
                  $sqlSelect .= " WHERE s.supplies_id = ss.id and ss.type = t.id and s.department_id = d.id and s.unit = un.id and s.status = 1";
                  if (isset($_GET["keyword"])) {
                    $keyword = $_GET["keyword"];
                    $sqlSelect .= " and (s.code like '%$keyword%' or ss.type like '%$keyword%')";
                  }
                  // echo $sqlSelect;
                  $result = mysqli_query($conn, $sqlSelect);
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"]
                    ?>
                    <tr class="text-center">
                     
                      <td>
                        <font size="2"><?php echo ($row["bill_no"]); ?></font>
                      </td>
                      <td>
                        <font size="2"><?php echo ($row["code"]); ?></font>
                      </td>
                      <td>
                        <font size="2"><?php echo ($row["tname"]); ?></font>
                      </td>
                      <td>
                        <font size="2"><?php echo ($row["supplies_name"]); ?></font>
                      </td>
                      <td>
                        <font size="2"><?php echo ($row["attribute"]); ?></font>
                      </td>
                      <td>
                        <font size="2"><?php echo ($row["name"]); ?></font>
                      </td>
                    
                      <td>
                        <font size="2"><?php echo ($row["fullname"]); ?></font>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
            </table>
            </form>
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
          <h5 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          คุณต้องการลบข้อมูลแจกจ่าย (วัสดุสิ้นเปลือง) ใช่หรือไม่
          <form id="form-drop" method="post" action="service/service_drop_durable_articles_permits.php">
            <input type="hidden" id="remove-permits" name="permits_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger" onclick="$('#form-drop').submit()">ยืนยันการลบข้อมูล</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>