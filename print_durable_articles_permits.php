<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT p.*, a.code ,a.attribute , a.model, d.fullname , a.picture ,d.bulding ,d.floor FROM durable_articles as a,durable_articles_permits as p ,department as d WHERE p.id = $id";
  $sql .= " and p.product_id = a.id and p.department_id = d.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
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
  <secretary style="display: none">display_durable_articles_permits</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">

</head>



<!-- Page Wrapper -->
<div id="wrapper">


  </nav>
  <!-- End of Topbar -->


  <!-- Begin Page Content -->

  <body onLoad="window.print()">
    <div class="container-fluid">

    </div>
</div>
<!-- เริ่มเขียนโค๊ดตรงนี้ --><br>

<div class="row">
  <div class="col-sm-12">
    <div class="table-responsive">
      <table width="900" border="1" align="center">
        <h7 class="m-3 font-weight-bold " align="center"> ข้อมูลการยืม-คืน(ครุภัณฑ์)</h7>
        <form>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12" align="center">
                <div class="center" style="width: 200px;">
                <img class="img-thumbnail" src="uploads/<?php echo $row["picture"]; ?>">
                </div>
              </div>
              <tbody>
                <thead>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-6">
                          <label class="text " for="book_no">เลขที่หนังสือ : </label>
                          <?php echo ($row["book_no"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text " for="code">รหัสครุภัณฑ์ : </label>
                          <?php echo ($row["code"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text " for="attribute">คุณสมบัติ/ลักษณะ : </label>
                          <?php echo ($row["attribute"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text " for="model">รุ่นแบบ : </label>
                          <?php echo ($row["model"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text " for="permit_date">วันที่ยืม : </label>
                          <?php echo ($row["permit_date"]); ?>
                        </div>
                    </td>
                    <td>
                      <div class="col-sm-12">
                        <label class="text " for="receive_date">วันที่คืน : </label>
                        <?php echo ($row["receive_date"]); ?>
                      </div>
            </div>
            </td>
            </tr>
            <tr>
              <td colspan="2">
              <div class="row">
                      <div class="col-md-12">
                        <label class="text " for="fullname">หน่วยงานที่ยืม : </label>
                        <?php echo ($row["fullname"]); ?>
                        <label class="text " for="bulding"> ตึก </label>
                        <?php echo ($row["bulding"]); ?>
                        <label class="text " for="floor"> ชั้น </label>
                        <?php echo ($row["floor"]); ?>
                      </div>
                    </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="text " for="flag">หมายเหตุ : </label>
                    <?php echo $row["flag"]; ?>
                  </div>
                </div>
              </td>
            </tr>
            </thead>
            </tbody>
      </table>
      <br>
      <br>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3 offset-sm-9">
            <label class="text">ตรวจแล้วถูกต้อง</label>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4 offset-sm-8">
            <label class="text">พ.ต.ท.หญิง......................................................</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3 offset-sm-9">
            <label class="text">(กรรณิการ์ เหล่าทัพ)</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3 offset-sm-9">
            <label class="text">รอง ผกก.ฝอ.สลก.ตร.
            </label>
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
</div>
<!-- สิ้นสุดการเขียนตรงนี้ -->
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<!-- Footer -->

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
        <h7 class="modal-title" id="exampleModalLabel">Ready to Leave?</h7>
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