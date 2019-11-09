<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT *, m.name, s.name as seller_name, t.name as durable_material_type_name, u.name as unit_name, s.tel seller_tel, s.fax seller_fax, s.address seller_address, p.document_no document_no FROM durable_material as m 
  LEFT JOIN durable_material_purchase as p ON m.id = p.product_id 
  LEFT JOIN seller as s ON m.seller_id = s.id 
  LEFT JOIN department as d ON m.department_id = d.id 
  LEFT JOIN durable_material_type as t ON m.type = t.id
  LEFT JOIN unit as u ON m.unit = u.id 
  WHERE m.id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
//ราคา
$total =  $row["price"];
//อายุการใช้งาน
$lifetime = $row["durable_year"];
//ดึงวันที่
$purchase = new DateTime($row["purchase_date"]);
//หาวัน เดือน ปี และ แต่ละเดือนมีกี่วัน
$day =  $purchase->format('d');
$month =  $purchase->format('m');
$year = $purchase->format('Y');
$dateMouth = $purchase->format('t');

// //ค่าเสื่อมประจำปีเต็ม
// $depPerYearM = $total * $rate / 100;
// echo $depPerYearM . "<br>";

// เดือนลบวัน 
$monthDay = ($dateMouth - $day) + 1;
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
  <secretary style="display: none">display_durable_material</secretary>

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
        <div class="col-md-10 offset-1">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-business-time"></i> ข้อมูลวัสดุคงทน</h6>
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
                      <?php echo thainumDigit($row["fullname"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="shortname">หน่วยงาน (ย่อ) : </label>
                      <?php echo thainumDigit($row["shortname"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="code">รหัสวัสดุ (คงทน) : </label>
                      <?php echo thainumDigit($row["code"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="asset_no">เลขสินทรัพย์ : </label>
                      <?php echo thainumDigit($row["asset_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="name">ประเภทวัสดุ : </label>
                      <?php echo thainumDigit($row["durable_material_type_name"]); ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark" for="name">ชื่อวัสดุ (คงทน) : </label>
                      <?php echo thainumDigit($row["name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                      <?php echo thainumDigit($row["attribute"]); ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark" for="name">หน่วยนับ : </label>
                      <?php echo thainumDigit($row["unit_name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="name">ร้านค้า : </label>
                      <?php echo thainumDigit($row["seller_name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="bill_no">เลขที่ใบเบิก : </label>
                      <?php echo thainumDigit($row["bill_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="document_no">เลขที่เอกสาร : </label>
                      <?php echo thainumDigit($row["document_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="durable_year">จำนวนปีวัสดุ : </label>
                      <?php echo thainumDigit($row["durable_year"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="price">จำนวนเงิน : </label>
                      <?php echo thainumDigit($row["price"]); ?>
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
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class='border-color-gray' align="left" cellpadding="5" cellspacing="5" border="1" width="100%">
                    <thead>
                      <tr class="text-center">
                        <th>วัน/เดือน/ปี</th>
                        <th>เลขที่เอกสาร</th>
                        <th>รายการ</th>
                        <th>จำนวนหน่วย</th>
                        <th>ราคาต่อหน่วย/ชุด/กลุ่ม</th>
                        <th>มูลค่ารวม</th>
                        <th>อายุการใช้งาน</th>
                        <th>อัตราค่าเสื่อมราคา</th>
                        <th>ค่าเสื่อมราคาประจำปี</th>
                        <th>ค่าเสื่อมราคาสะสม</th>
                        <th>มูลค่าสุทธิ</th>
                        <th>หมายเหตุ</th>
                      </tr class="text-center">
                    </thead>

                </div>
                <thead>
                  <tr class="text-center">
                    <td><?php $dayY =  $purchase->format('d') . "\n";
                        $month =  $purchase->format('m') . "\n";
                        $year =  $purchase->format('Y');
                        echo thainumDigit($dayY);
                        echo month($month);
                        echo thainumDigit($year);
                        ?>
                    </td>
                    <td></td>
                    <td> <?php echo thainumDigit($row["attribute"] . "<br>"); ?>** <?php echo thainumDigit($row["name"]); ?>**</td>
                    <td>๑</td>
                    <td><?php echo thainumDigit(number_format(($row["price"]), 2, '.', '')); ?></td>
                    <td><?php echo thainumDigit(number_format(($row["price"]), 2, '.', '')); ?></td>
                    <td><?php echo thainumDigit($row["durable_year"]); ?></td>
                    <td><?php $rate = 100 / $row["durable_year"];
                        echo thainumDigit(number_format($rate, 2, '.', '')); ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-actions text-center">
                  </tr>

                  <?php
                  $deptotal = 0;
                  $firstDep = 0;
                  $totalAll = 0;
                  for ($i = 0; $i < $lifetime + 1; $i++) {

                    ?>
                    <tr class="text-center">
                      <td width="10%">
                        <?php if ($i == ($lifetime)) {
                            echo thainumDigit($purchase->format('d'));
                          } else {
                            echo thainumDigit($dateMouth);
                          }
                          echo thainumDigit(" " . $month . " ");
                          if ($i >= 1) {
                            echo thainumDigit($year + $i);
                          } else {
                            echo thainumDigit($year);
                          }
                          ?>
                      </td>
                      <td></td>
                      <td>คิดค่าเสื่อม</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <?php
                          if ($i == 0) {
                            $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                            $firstDep = number_format($depPerYear, 2, '.', '');
                            $deptotal += number_format($depPerYear, 2, '.', '');
                            echo thainumDigit(number_format($depPerYear, 2, '.', ''));
                          } else if ($i == $lifetime) {
                            //$NETT = ($netvalue  + $Yearcumu) - 1;
                            //$deptotal += number_format($NETT, 2, '.', '');
                            // echo number_format($NETT, 2, '.', '') . "<br>";
                            $depPerYearM = $total * $rate / 100;
                            $lastMoney = $depPerYearM - $firstDep;
                            $deptotal += number_format($lastMoney, 2, '.', '') - 1;
                            echo thainumDigit(number_format($lastMoney, 2, '.', ''));
                          } else {
                            $depPerYearM = $total * $rate / 100;
                            $deptotal += number_format($depPerYearM, 2, '.', '');
                            echo thainumDigit(number_format($depPerYearM, 2, '.', ''));
                          }
                          ?>
                      </td>
                      <td>
                        <?php
                          // if ($i == 0) {
                          //   $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                          //   echo number_format($depPerYear, 2, '.', '');
                          // } else if ($i == $lifetime) {
                          //   $Yearcumu = $depPerYearM  + $depPerYear;
                          //   echo number_format($Yearcumu, 2, '.', '') . "<br>";
                          // } else {
                          //   $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                          //   echo number_format($depPerYear, 2, '.', '') . "<br>";
                          // }
                          echo thainumDigit(number_format($deptotal, 2, '.', ''));

                          ?>
                      </td>

                      <td>
                        <?php
                          $totalAll = $total - $deptotal;
                          echo thainumDigit(number_format($totalAll, 2, '.', ''));
                          ?>
                      </td>
                      <td></td>
                    </tr>
                  <?php
                  }
                  ?>
                </thead>
                </table>
              </div>
            </div>
        </div>
      </div>
      </form>

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
          <h5 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"]; ?> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
          <img src="generate_qrcode_material.php?id=<?php echo $row["id"]; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <a href="generate_qrcode_material.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" style="color: white; cusor: pointer" download>ดาวน์โหลด</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>