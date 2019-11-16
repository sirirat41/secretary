<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM durable_articles_repair_history as r ,durable_articles as a WHERE r.id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $receivedate = $item["receive_date"];
  $newReceivedate = date("Y-m-d", strtotime($receivedate));
  $show = 10;
}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display: none">display_durable_articles_repair_history</secretary>


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
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card shado mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger body-text"><i class="fas fa-wrench"></i> แก้ไขรายละเอียดการซ่อม(ครุภัณฑ์)</h6>
            </div>
            <div class="card-body">
              <form method="post" action="service/service_edit_durable_articles_repair_history.php?id=<?php echo $id; ?>" id="form_insert">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group body-text">
                      <label for="seq">ลำดับ</label>
                      <input type="text" class="form-control body-text" name="seq" id="seq" aria-describedby="seq" placeholder="" value="<?php echo $item["seq"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group body-text">
                      <label for="receive_date">วันที่ซ่อม</label>
                      <input type="date" class="form-control body-text" name="receive_date" id="receive_date" aria-describedby="receive_date" placeholder="" value="<?php echo $newReceivedate; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
<<<<<<< HEAD
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="repair_id">รหัสการซ่อมครุภัณฑ์</label>
                      <input class="form-control body-text" name="repair_id" type="text" placeholder="repair_id" id="repair_id" value="<?php echo $item["code"]; ?>" readonly>
=======
                  <div class="col-12 ">
                    <div class="form-group">
                      <label for="repair_id">รหัสการซ่อมครุภัณฑ์</label>
                      <div class="row">
                        <div class="col-10 ">
                        <select class="form-control" name="repair_id" id="repair_id" value="<?php echo $item["repair_id"]; ?>">
                            <?php
                            $sqlSelectType = "SELECT * FROM durable_articles";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              if ($item["repair_id"] == $row["id"]) {
                              echo '<option value="' . $row["id"] . '"selected>' . $row["code"] . '</option>';
                            } else {
                              echo '<option value="' . $row["id"] . '">' . $row["code"] . '</option>';
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-form-search" onclick="search()">
                            <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
>>>>>>> b42bdf62644303c82355bb6e3640ea59e0a2a711
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group body-text">
                      <label for="fix">รายการซ่อมครุภัณฑ์</label>
                      <input type="text" class="form-control body-text" name="fix" id="fix" aria-describedby="fix" placeholder="listfix" value="<?php echo $item["fix"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group body-text">
                      <label for="price">ราคา</label>
                      <input type="text" class="form-control body-text" name="price" id="price" aria-describedby="price" placeholder="price" value="<?php echo $item["price"]; ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="flag">หมายเหตุ</label>
                      <textarea class="form-control body-text" name="flag" id="flag" placeholder="flag" rows="3"><?php echo $item["flag"]; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn btn-block body-text" data-toggle="modal" data-target="#exampleModal">
                      บันทึก
                      <div class="ripple-container"></div></button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body body-text">
                            คุณต้องการบันทึกข้อมูลรายการซ่อมครุภัณฑ์หรือไม่ ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
                          </div>
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

  <div class="modal fade" id="modal-form-search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          <div class="row">
            <div class="col-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger body-text">
                      <i class="fas fa-business-time"></i> แสดงข้อมูลครุภัณฑ์</h6>
                    <form class="form-inline" id="form-search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="input-search" >
                   <div>
                        <button class="btn btn-outline-danger" type="submit" >
                          <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
              </div>
              </nav>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-hover ">
                      <thead>
                        <tr class="text-center body-text">
                          <th>ลำดับ</th>
                          <th>วันที่ซ่อม</th>
                          <th>รหัสครุภัณฑ์(ชำรุด)</th>
                          <th>ลักษณะ/คุณสมบัติ</th>
                          <th>ชื่อครุภัณฑ์</th>
                          <th>การทำงาน</th>
                        </tr class="text-center">
                      </thead>
                      <tbody id="modal-articles-body">
                        <!-- ///ดึงข้อมูล -->
                        <?php
                        //$page = isset($_GET["page"]) ? $_GET["page"] : 1;


                        $sqlSelect = "SELECT r.*, a.code ,a.attribute , a.model FROM durable_articles_repair as r, durable_articles as a";
                        $sqlSelect .= " WHERE r.damage_id = a.id and r.status = 1";
                        if (isset($_GET["keyword"])) {
                          $keyword = arabicnumDigit($_GET["keyword"]);
                          $sqlSelect .= " and (a.code like '%$keyword%' or a.model like '%$keyword%')";
                        }
                        //echo $sqlSelect;
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"]
                          ?>
                          <tr class="text-center body-text">
                            <td><?php echo $row["seq"]; ?></td>
                            <td><?php echo $row["repair_date"]; ?></td>
                            <td><?php echo ($row["code"]); ?></td>
                            <td><?php echo $row["attribute"]; ?></td>
                            <td><?php echo $row["model"]; ?></td>
                            <td class="td-actions text-center">
                              <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedArticles(<?php echo $row["id"]; ?>);">
                                <i class="fas fa-check"></i>
                              </button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center" id="pagination">
                <li class="page-item" id="prev-page">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item" id="next-page">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
  </div>
  <script>
   var itemPerPage = 10; //จำนวนข้อมูล
    var jsonData;
    var currentPage = 1;
    var maxPage = 1;
    var showPageSection = 10; //จำนวนเลขหน้า
    var numberOfPage;
    $('#form-search').on('submit', function(e) {
        e.preventDefault();
        search();
      })
    function search() {
      var keyword = $('#input-search').val().trim();
      $.ajax({
        url: 'service/service_search_json_durable_articles_repair.php?keyword=' + keyword,
        dataType: 'JSON',
         type: 'GET',
        success: function(data) {
          jsonData = data;
          numberOfPage = data.length / itemPerPage;
          changePage(1);
        },
        error: function(error) {
          console.log(error);
        }
      })
    }
    function changePage(page) {
      currentPage = page;
      var body = $('#modal-articles-body');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const item = jsonData[i];
        //console.log(item);
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var seq = item["seq"];
        var repair_date = item["repair_date"];
        var code = item["code"];
        var attribute = item["attribute"];
        var model = item["model"];
        $('<td>' + seq + '</td>').appendTo(tr);
        $('<td>' + repair_date + '</td>').appendTo(tr);
        $('<td>' + code + '</td>').appendTo(tr);
        $('<td>' + attribute + '</td>').appendTo(tr);
        $('<td>' + model + '</td>').appendTo(tr);
        $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success"onclick="selectedArticles(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
        generatePagination();
     
      }
    }

    function generatePagination() {
      $('#pagination').empty();
      $('<li class="page-item" id="prev-page"> <a class="page-link" href="#" onclick="prevPage();" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span> </a> </li>').appendTo($('#pagination'));
      $('<li class="page-item" id="next-page"> <a class="page-link" href="#" onclick="nextPage();" aria-label="Next"> <span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span> </a> </li>').appendTo($('#pagination'));
      $('new-page').removeClass();
      maxPage = numberOfPage;

      var countDiv = parseInt((currentPage - 1) / showPageSection);
      var start_i = (countDiv * showPageSection);
      var sectionGroup = ((countDiv * showPageSection) + showPageSection);
      var end_i = sectionGroup > maxPage ? maxPage : sectionGroup;

      for (let i = start_i; i < end_i; i++) {
        if (i != 0 && i == start_i) {
          $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i) + ');">' + ("......") + '</a></li>').insertBefore($('#next-page'));
        }
        $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 1) + ');">' + thaiNumber(i + 1) + '</a></li>').insertBefore($('#next-page'));
        if ((i + 1) < maxPage && i == end_i - 1) {
          $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 2) + ');">' + ("......") + '</a></li>').insertBefore($('#next-page'));
        }
      }

    }

    function thaiNumber(num) {
      var array = {
        "1": "๑",
        "2": "๒",
        "3": "๓",
        "4": "๔",
        "5": "๕",
        "6": "๖",
        "7": "๗",
        "8": "๘",
        "9": "๙",
        "0": "๐"
      };
      var str = num.toString();
      for (var val in array) {
        str = str.split(val).join(array[val]);
      }
      return str;
    }
    function selectedArticles(id) {
      $('#modal-form-search').modal('hide');
      $('body').removeClass('modal-open');
$('.modal-backdrop').remove();
      $('#repair_id').val(id);
    }
  </script>

</body>

</html>