<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT u.*, t.t_code ,au.Aname ,au.position ,au.rank FROM user as u, u_type as t  ,auditor as au WHERE u.id = $id";
  $sql .= " and u.u_type = t.id and u.status = 1";
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
  <secretary style="display: none">display_user</secretary>

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
    <div class="table-responsive" align="center">
      <table width="600" border="1" align="center">
        <h6 class="m-3 font-weight-bold " align="center"> การเก็บข้อมูลผู้ใช้งานของสำนักงานเลขานุการตำรวจแห่งชาติ</h6>
        <form>
          <div class="card-body">
            <tbody>
              <thead>
                <tr>
                  <td colspan="2">
                    <div class="row">
                      <div class="col-sm-6">
                        <label class="text-dark" for="username">ชื่อสมาชิก : </label>
                        <?php echo $row["username"]; ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="row">
                      <div class="col-sm-12">
                        <label class="text-dark" for="password">รหัสผ่าน : </label>
                        <?php echo ($row["password"]); ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="row">
                      <div class="col-sm-12">
                        <label class="text-dark" for="surname">ชื่อ : </label>
                        <?php echo $row["surname"]; ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="row">
                      <div class="col-sm-12">
                        <label class="text-dark" for="lastname">นามสกุล : </label>
                        <?php echo $row["lastname"]; ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="row">
                      <div class="col-sm-12">
                        <label class="text-dark" for="position">ตำแหน่ง : </label>
                        <?php echo $row["position"]; ?>
                      </div>
                  </td>
                  <td>
                    <div class="col-sm-12">
                      <label class="text-dark" for="t_code">ประเภท : </label>
                      <?php echo $row["t_code"]; ?>
                    </div>
          </div>
          </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-sm-12">
                  <label class="text-dark" for="tel">เบอร์โทร : </label>
                  <?php echo ($row["tel"]); ?>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-sm-12">
                  <label class="text-dark" for="email">อีเมล์ : </label>
                  <?php echo $row["email"]; ?>
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
            <div class="col-sm-5 offset-sm-7" align="right">
              <label class="text"><?php echo $row["rank"];?>......................................................</label>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 offset-sm-9">
              <label class="text">(<?php echo $row["Aname"];?>)</label>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 offset-sm-9">
              <label class="text"><?php echo $row["position"];?>
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