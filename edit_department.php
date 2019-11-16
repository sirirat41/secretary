<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM department WHERE id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);

  //item.code java odject , item["code"] php

}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display : none">display_department</secretary>

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
      <br>
      <div class="row ">
        <div class="col-8 offset-2">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger body-text">
                  <i class="fas fa-fw fa-city"></i>
                  แก้ไขข้อมูลหน่วยงาน
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_edit_department.php?id=<?php echo $id; ?>" id="form_insert" enctype="multipart/form-data">
                <div class="row">
                  <div class=" col-12">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">ชื่อหน่วยงาน</label>
                      <input class="form-control" name="fullname" type="text" autocomplete="off" placeholder="department" id="department" value="<?php echo $item["fullname"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">ตำแหน่ง</label>
                      <input class="form-control" name="shortname" type="text" placeholder="shortdepartment" id="shortdepartment" value="<?php echo $item["shortname"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class=" col-6">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">อาคาร</label>
                      <input class="form-control" name="bulding" type="text" placeholder="bulding" id="bulding" value="<?php echo $item["bulding"]; ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">ชั้น</label>
                      <input class="form-control" name="floor" type="text" placeholder="floor" id="floor" value="<?php echo $item["floor"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class=" col-12">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">โทรศัพท์</label>
                      <input class="form-control" name="tel" type="text" placeholder="tel" id="tel" value="<?php echo $item["tel"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class=" col-12">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">โทรสาร</label>
                      <input class="form-control" name="fax" type="text" placeholder="fax" id="fax" value="<?php echo $item["fax"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-raised">
                        <img class="img-thumbnail" src="uploads/<?php echo $item["pic"]; ?>" width="100" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                      <div>
                        <span class="btn btn-raised btn-round btn-default btn-file">

                          <div class="col-2">
                            <input type="file" name="image" />
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn btn-block body-text" data-toggle="modal" data-target="#exampleModal">
                      บันทึก
                      <div class="ripple-container"></div>
                    </button>
                    <!-- Modal -->

                  </div>
                </div>
            </div>
          </div>
          <br>
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">แจ้งเตือน </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body body-text">
          คุณต้องการบันทึกข้อมูลหน่วยงานหรือไม่ ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      <?php
      if (isset($_GET["message"])); {
        $message = $_GET["message"];
        echo "$('#modal-message').modal();";
      }
      ?>
    })
  </script>
  <!-- Message Modal-->
  <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $_GET["message"]; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ตกลง</button>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>