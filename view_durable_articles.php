<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = "SELECT *, s.name as seller_name, t.name as durable_articles_type_name, u.name as unit_name, s.tel seller_tel, s.fax seller_fax, s.address seller_address, p.document_no document_no FROM durable_articles as a 
  LEFT JOIN durable_articles_purchase as p ON a.id = p.product_id 
  LEFT JOIN seller as s ON a.seller_id = s.id 
  LEFT JOIN department as d ON a.department_id = d.id 
  LEFT JOIN durable_articles_type as t ON a.type = t.id
  LEFT JOIN unit as u ON a.unit = u.id 
  WHERE a.id = $id";
  // echo $sql;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  // $depPerYear = ($row["price"] - 1) / $row["durable_year"];
  // $depPerMouth = $depPerYear / 12
  // echo "year :" . +number_format((float) $depPerYear, 2, '.', '') . "<br>";
  // echo "mouth :" . +number_format((float) $depPerMouth, 2, '.', '');


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

  <title>secretary</title>
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
                <h6 class="m-0 font-weight-bold text-danger body-text">
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
                      <label class="text-dark body-text" for="fullname">หน่วยงานที่รับผิดชอบ : </label>
                      <?php echo ($row["fullname"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="shortname">หน่วยงาน (ย่อ) : </label>
                      <?php echo ($row["shortname"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="code">รหัสครุภัณฑ์ : </label>
                      <?php echo ($row["code"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="asset_no">เลขสินทรัพย์ : </label>
                      <?php echo ($row["asset_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="type">ประเภทครุภัณฑ์ : </label>
                      <?php echo ($row["durable_articles_type_name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="model">รุ่นแบบ : </label>
                      <?php echo $row["model"] == "" ? "<ไม่มีข้อมูล>" : ($row["model"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark body-text" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                      <?php echo $row["attribute"] == "" ? "<ไม่มีข้อมูล>" : ($row["attribute"]); ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark body-text" for="unit">หน่วยนับ : </label>
                      <?php echo $row["unit_name"] == "" ? "<ไม่มีข้อมูล>" : ($row["unit_name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="bill_no">เลขที่ใบเบิก : </label>
                      <?php echo $row["bill_no"] == "" ? "<ไม่มีข้อมูล>" : ($row["bill_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="document_no">เลขที่เอกสาร : </label>
                      <?php echo $row["document_no"] == "" ? "<ไม่มีข้อมูล>" : ($row["document_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="budget">งบประมาณ : </label>
                      <?php echo $row["budget"] == "" ? "<ไม่มีข้อมูล>" : ($row["budget"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="d_gen">เอกสารสำรองเงิน : </label>
                      <?php echo $row["d_gen"] == "" ? "<ไม่มีข้อมูล>" : ($row["d_gen"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="seller_id">ชื่อผู้ขาย : </label>
                      <?php echo $row["seller_name"] == "" ? "<ไม่มีข้อมูล>" : ($row["seller_name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="price">จำนวนเงิน : </label>
                      <?php echo ($row["price"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="durable_year">จำนวนปีครุภัณฑ์ : </label>
                      <?php echo ($row["durable_year"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="storage">ห้องเก็บครุภัณฑ์ : </label>
                      <?php echo $row["storage"] == "" ? "<ไม่มีข้อมูล>" : ($row["storage"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="money_type">ประเภทเงิน : </label>
                      <?php echo $row["money_type"] == "" ? "<ไม่มีข้อมูล>" : ($row["money_type"]); ?>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="acquiring">วิธีการได้มา : </label>
                      <?php echo $row["acquiring"] == "" ? "<ไม่มีข้อมูล>" : ($row["acquiring"]); ?>
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
              <h5 class="m-0 font-weight-bold text-danger">
                <i class="fas fa-business-time"></i> ค่าเสื่อมรายปี</h5>
          </div>
          <form>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class='border-color-gray' align="left" cellpadding="5" cellspacing="5" border="1" width="100%">
                    <thead>
                      <tr class="text-center body-text">
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
                              echo ($dayY);
                              echo month($month);
                              echo ($year);
                        ?>
                    </td>
                    <td><?php echo ($row["document_no"] . "<br>"); ?></td>
                    <td> <?php echo ($row["attribute"] . "<br>"); ?>** <?php echo ($row["model"]); ?>**</td>
                    <td>๑</td>
                    <td><?php echo (number_format(($row["price"]), 2, '.', '')); ?></td>
                    <td><?php echo (number_format(($row["price"]), 2, '.', '')); ?></td>
                    <td><?php echo ($row["durable_year"]); ?></td>

                    <td><?php
                        if (isset($_SESSION[$row["durable_year"]])) {

                          $rate = "";
                        } else if ($row["durable_year"]) {

                          $rate = 100 / $row["durable_year"];
                          echo (number_format($rate, 2, '.', ''));
                        } else {

                          $rate = "0";
                        }
                        ?>
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
                            echo ($purchase->format('d'));
                          } else {
                            echo ($dateMouth);
                          }
                          echo month(" " . $month . " ");
                          if ($i >= 1) {
                            echo ($year + $i);
                          } else {
                            echo ($year);
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
                            echo (number_format($depPerYear, 2, '.', ''));
                          } else if ($i == $lifetime) {
                            //$NETT = ($netvalue  + $Yearcumu) - 1;
                            //$deptotal += number_format($NETT, 2, '.', '');
                            // echo number_format($NETT, 2, '.', '') . "<br>";
                            $depPerYearM = $total * $rate / 100;
                            $lastMoney = $depPerYearM - $firstDep;
                            $deptotal += number_format($lastMoney, 2, '.', '') - 1;
                            echo (number_format($lastMoney, 2, '.', ''));
                          } else {
                            $depPerYearM = $total * $rate / 100;
                            $deptotal += number_format($depPerYearM, 2, '.', '');
                            echo (number_format($depPerYearM, 2, '.', ''));
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
                          echo (number_format($deptotal, 2, '.', ''));

                          ?>
                      </td>

                      <td>
                        <?php
                          $totalAll = $total - $deptotal;
                          echo (number_format($totalAll, 2, '.', ''));
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
          <h4 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"]; ?> </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
          <img src="generate_qrcode_articles.php?id=<?php echo $id; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
          <a href="generate_qrcode_articles.php?id=<?php echo $id; ?>" class="btn btn-danger body-text" style="color: white; cursor: pointer" download>ดาวโหลด</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>