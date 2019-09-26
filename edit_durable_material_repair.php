<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM durable_material_repair WHERE id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $repairDate = $item["repair_date"];
  $newrepairDate = date("ํY-m-d", strtotime($repairDate));
  $show=10;
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
  <secretary style="display: none">insert_durable_material_repair</secretary>


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
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card shado mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-wrench"></i> แก้ไขข้อมูลซ่อม(วัสดุคงทน)</h6>
            </div>
            <div class="card-body">
              <form method="post" action="service/service_edit_durable_material_repair.php?id=<?php echo $id; ?>" id="form_insert">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="seq">ลำดับ</label>
                      <input type="text" class="form-control" name="seq" id="inputseq" aria-describedby="seq" placeholder="seq" value="<?php echo $item["seq"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="repair_date">วันที่ซ่อม</label>
                      <input type="date" class="form-control" name="repair_date" id="inputrepair_date" aria-describedby="repair_date" placeholder="" value="<?php echo $item["repair_date"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="damage_id">รหัสวัสดุ(ชำรุด)</label>
                      <div class="row">
                        <div class="col-md-10">
                          <select class="form-control" name="damage_id" id="damage_id" value="<?php echo $item["damage_id"]; ?>">
                            <?php
                            $sqlSelectType = "SELECT * FROM durable_material where status = 1";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              if ($item["damage_id"] == $row["id"]) {
                                echo '<option value="' . $row["id"] . '" selected>' . $row["code"] . '</option>';
                              } else {
                                echo '<option value="' . $row["id"] . '">' . $row["code"] . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-form-search" onclick="search()">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="place">สถานที่ซ่อม</label>
                      <textarea class="form-control" name="place" id="exampleFormControlTextarea1" placeholder="place" rows="3"><?php echo $item["place"]; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn btn-block " data-toggle="modal" data-target="#exampleModal">
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
                          <div class="modal-body">
                            คุณต้องการบันทึกข้อมูลการซ่อมวัสดุหรือไม่ ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
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

  <div class="modal fade" id="modal-form-search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10 offset-1 ">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger">
                      <i class="fas fa-wrench"></i> แสดงข้อมูลการซ่อม(วัสดุคงทน)</h6>
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" name="keyword" id="keyword" placeholder="Search" aria-label="Search">
                      <div>
                        <button class="btn btn-outline-danger" type="button" onclick="search();">
                          <i class="fas fa-search"></i>
                        </button>
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
                        
                          <th>รหัสวัสดุ</th>
                            <th>วันที่ชำรุด</th>
                            <th>หมายเหตุ</th>
                            <th>การทำงาน</th>
                          </tr>
                        </thead>
                        <tbody id="modal-material-body">
                        <?php
                     
                          $sqlSelect = "SELECT da.*, a.code FROM durable_material_damage as da, durable_material as a";
                          $sqlSelect .= " WHERE da.product_id = a.id and da.status = 1";
                          if (isset($_GET["keyword"])) {
                            $keyword = arabicnumDigit($_GET["keyword"]);
                            $sqlSelect .= " and (da.product_id like '%$keyword%' or a.code like '%$keyword%')";
                          }
                          $result = mysqli_query($conn, $sqlSelect);
                          while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"]
                            ?>
                            <tr class="text-center">
                            <td><?php echo thainumDigit($row["code"]); ?></td>
                              <td><?php echo $row["damage_date"]; ?></td>
                              <td><?php echo $row["flag"]; ?></td>
                              <td class="td-actions text-center">
                                <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedmaterial(<?php echo $row["id"]; ?>);">
                                  <i class="fas fa-check"></i>
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
    var itemPerPage = 10;
    var jsonData;
    $('#form-search').on('submit', function(e) {
        e.preventDefault();
        search();
      })
    function search() {
      $('#pagination').empty();
          $('<li class="page-item" id="prev-page"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span> </a> </li>').appendTo($('#pagination'));
          $('<li class="page-item" id="next-page"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span> </a> </li>').appendTo($('#pagination'));
        
        
      var keyword = $('#input-search').val().trim();
      $.ajax({
        url: 'service/service_search_json_durable_material.php?keyword=' + keyword,
        dataType: 'JSON',
         type: 'GET',
        success: function(data) {
          
          jsonData = data;
          changePage(1);
          $('new-page').removeClass();
          var numberOfPage = Math.ceil(data.length / itemPerPage);
          for (let i = 0; i < numberOfPage; i++) {
            $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 1) + ');">' + (i + 1) + '</a></li>').insertBefore($('#next-page'));
          }
        },
        error: function(error) {
          console.log(error);
        }
      })
    }
    function changePage(page) {
      var body = $('#modal-material-body');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const item = jsonData[i];
        //console.log(item);
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var picture = item["picture"];
        var seq = item["seq"];
        var bill_no = item["bill_no"];
        var code = item["code"];
        var flag = item["flag"];
            $('<td>' + item.damage_date + '</td>').appendTo(tr);
            $('<td>' + item.code + '</td>').appendTo(tr);
            $('<td>' + item.flag + '</td>').appendTo(tr);
            $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" onclick="selectedmaterial(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
          }
        }
    function selectedmaterial(id) {
      $('#modal-form-search').modal('hide');
      $('#product_id').val(id);
    }
  </script>

</body>

</html>