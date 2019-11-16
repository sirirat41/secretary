<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT s.*,ss.attribute ,ss.supplies_name ,d.fullname ,sl.name ,u.name as uname FROM supplies as s , supplies_stock as ss ,department as d ,seller as sl ,unit as u WHERE s.id = $id";
  $sql .= " and s.supplies_id = ss.id and s.status = 1 ";
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
  <secretary style="display: none">display_supplies_purchase</secretary>

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
        <h6 class="m-3 font-weight-bold " align="center"> ข้อมูลการจัดซื้อ (วัสดุสิ้นเปลือง)</h6>
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
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="bill_no">เลขที่ใบเบิก : </label>
                          <?php echo ($row["bill_no"]); ?>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="code">รหัสวัสดุ : </label>
                          <?php echo ($row["code"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-12">
                        <label class="text-dark" for="supplies_name">ชื่อวัสดุ : </label>
                          <?php echo ($row["supplies_name"]); ?>
                   
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                        <label class="text-dark" for="attribute">คุณสมบัติ/ลักษณะ : </label>
                          <?php echo ($row["attribute"]); ?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="uname">หน่วยนับ : </label>
                          <?php echo ($row["uname"]); ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="price">ราคา : </label>
                          <?php echo $row["price"]; ?>
                        </div>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="fullname">หน่วยงานที่รับผิดชอบ : </label>
                          <?php echo $row["fullname"]; ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="text-dark" for="name">ร้านค้า : </label>
                          <?php echo ($row["name"]); ?>
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