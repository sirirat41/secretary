<?php
require "service/connection.php";
$show = 10;
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
  <secretary style="display: none">display_supplies_permits</secretary>

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

    <?php include "navigation/navbar.php"; ?>s

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-business-time"></i> แสดงข้อมูลการยืม-คืน(วัสดุสิ้นเปลือง)</h6>
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                  <div>
                    <button class="btn btn-outline-danger" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-outline-info" type="button" onclick="window.location.href='insert_supplies_permits.php';">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button class="btn btn-outline-warning" type="button" onclick="window.location.href='rowback_supplies_permits.php';">
                      <i class="fas fa-sync-alt"></i>
                    </button>
                    <a rel="tooltip" class="btn btn-outline-primary" href="printall_supplies_permits.php" target="_blank">
                      <i class="fas fa-print"></i>
                    </a>
                </form>
            </div>
          </div>
          </nav>
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover ">
                    <thead>
                      <tr class="text-center">
                        <th>รหัสครุภัณฑ์</th>
                        <th>ลักษณะ/คุณสมบัติ</th>
                        <th>ชื่อครุภัณฑ์</th>
                        <th>วันที่ยืม</th>
                        <th>วันที่คืน</th>
                        <th>การทำงาน</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //$page = isset($_GET["page"]) ? $_GET["page"] : 1;
                      if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                      } else {
                        $page = 1;
                      }
                      $start = ($page - 1) * $show;
                       $sqlSelect = "SELECT p.*, s.code , s.attribute ,s.name FROM supplies_permits as p,supplies as s";
                       $sqlSelect .= " WHERE p.product_id = s.id and p.status = 1";
                      if (isset($_GET["keyword"])) {
                        $keyword = arabicnumDigit($_GET["keyword"]);
                        $sqlSelect .= " and (s.code like '%$keyword%' or permit_date like '%$keyword%')";
                      }
                      $sqlSelect .= " Order by p.id desc LIMIT $start, $show";
                      $result = mysqli_query($conn, $sqlSelect);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        ?>
                        <tr class="text-center">
                          <td><?php echo thainumDigit($row["code"]); ?></td>
                          <td><?php echo $row["attribute"]; ?></td>
                          <td><?php echo $row["name"]; ?></td>
                          <td><?php echo $row["permit_date"]; ?></td>
                          <td><?php echo $row["receive_date"]; ?></td>
                          <td class="td-actions text-center">
                          <button type="button" rel="tooltip" class="btn btn-warning"
                            onclick="window.location = 'edit_supplies_permits.php?id=<?php echo $row['id']; ?>'">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location = 'view_supplies_permits.php?id=<?php echo $row['id']; ?>'">
                              <i class="fas fa-clipboard-list"></i>
                            </button>
                            <a rel="tooltip" class="btn btn-primary" style="color: white" href="print_supplies_permits.php?id=<?php echo $row['id']; ?>" target="_blank">
                            <i class="fas fa-print"></i>
                          </a>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="$('#remove-permits').val('<?php echo $id; ?>')">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          <?php
                          }

                          ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </form>
        </div>

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php
               $sqlSelectCount = "SELECT p.*, s.code , s.attribute ,s.name FROM supplies_permits as p,supplies as s";
               $sqlSelectCount .= " WHERE p.product_id = s.id and p.status = 1";
              if (isset($_GET["keyword"])) {
                $keyword = arabicnumDigit($_GET["keyword"]);
                $sqlSelectCount .= " and (s.code like '%$keyword%' or permit_date like '%$keyword%')";
             }
            $sqlSelectCount .= " Order by p.id desc";
            $resultCount = mysqli_query($conn, $sqlSelectCount);
            $total = mysqli_num_rows($resultCount);
            $page = ceil($total / $show);
            for ($i = 0; $i < $page; $i++) {
              if (isset($_GET["keyword"])) {
                ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($i + 1); ?>&keyword=<?php echo $_GET["keyword"]; ?>"><?php echo ($i + 1); ?></a></li>
              <?php
                } else {
                  ?>

                <li class="page-item"><a class="page-link" href="?page=<?php echo ($i + 1); ?>"><?php echo ($i + 1); ?></a></li>
            <?php

            }}
            ?>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
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
          คุณต้องการลบข้อมูลการยืม-คืนวัสดุใช่หรือไม่
          <form id="form-drop" method="post" action="service/service_drop_durable_material_permits.php">
            <input type="hidden" id="remove-permits" name="permits_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger" onclick="$('#form-drop').submit()">ยืนยันการลบข้อมูล</button>
        </div>
      </div>
    </div>
</body>

</html>