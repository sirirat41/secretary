<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM durable_articles_repair as r,durable_articles as a WHERE r.id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $repairdate = $item["repair_date"];
  // $purchaseDate = $item["permit_date"];
  // $newReceiveDate = date("ํY-m-d", strtotime($receiveDate));
  $newrepairdate = date("Y-m-d", strtotime($repairdate));
  $show = 10;
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
  <secretary style="display: none">display_durable_articles_repair</secretary>


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
              <h6 class="m-0 font-weight-bold text-danger body-text"><i class="fas fa-wrench"></i> แก้ไขข้อมูลการซ่อม(ครุภัณฑ์)</h6>
            </div>
            <div class="card-body">
              <form method="post" action="service/service_edit_durable_articles_repair.php?id=<?php echo $id; ?>" id="form_insert">
                <div class="row">
                 
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="repair_date">วันที่ซ่อม</label>
                      <input type="date" class="form-control body-text" name="repair_date" id="inputrepair_date" aria-describedby="repair_date" placeholder="" value="<?php echo $newrepairdate; ?>">
                      <small id="alert-inputrepair_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 ">

                    <div class="form-group">
                      <label for="damage_id">รหัสครุภัณฑ์(ชำรุด)</label>
                      <div class="row">
                        
                        <div class="col-10">
                          <select class="form-control" name="damage_id" id="damage_id" value="<?php echo $item["damage_id"]; ?>">
                            <?php
                            $sqlSelectType = "SELECT * FROM durable_articles WHERE status = 3";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              if ($item["damage_id"] == $row["id"]) {
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
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="place">สถานที่ซ่อม</label>
                      <textarea type="text" class="form-control body-text" name="place" id="place" rows="3" placeholder="place"><?php echo $item["place"]; ?></textarea>
                      <small id="alert-place" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="button" class="btn btn-danger btn btn-block " onclick="validateData();">
                    บันทึก
                    <div class="ripple-container"></div></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-12">
            <div class="card">

              <div class="card-body">
                <div class="table-responsive">
                  <table class='border-color-gray' align="center" cellpadding="10" cellspacing="10" border="1" width="100%" id="myTbl">
                    <thead>
                      <tr class="text-center">
                        <td rowspan="2">ลำดับ</td>
                        <td rowspan="2">เลขระยะทางเมื่อเข้าซ่อม</td>
                        <td rowspan="2">รายการซ่อม</td>
                        <td colspan="2" width="15%" height="10">จำนวนเงิน</td>
                        <td rowspan="2">สถานที่ซ่อม</td>
                        <td rowspan="2">วันตรวจรับ</td>
                        <td rowspan="2">หมายเหตุ</td>
                      </tr class="text-center">
                      <tr class="text-center">
                        <td width="8%">บาท </td>
                        <td width="6%">สตางค์</td>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <?php
                      $sqlSelect = "SELECT * FROM durable_articles_repair_history as h";
                      $sqlSelect .= " WHERE h.repair_id = " . $_GET["id"];
                      //echo $sqlSelect;
                      $result = mysqli_query($conn, $sqlSelect);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"]
                        ?>
                        <tr class="text-center" height="30" id="firstTr">
                          <td> <input type="hidden" class="form-control history_id" name="seq[]" id="seq" placeholder="" value="<?php echo $row["id"]; ?>"><input type="text" class="form-control seq" name="seq[]" id="seq" placeholder="" value="<?php echo $row["seq"]; ?>"></td>
                          <td> <input type="text" class="form-control mileage_number" name="mileage_number[]" id="mileage_numberm" placeholder="" value="<?php echo $row["mileage_number"]; ?>"></td>
                          <td> <input type="text" class="form-control fix" name="fix[]" id="fix" placeholder="" name="fix" value="<?php echo $row["fix"]; ?>"></td>
                          <td> <input type="text" class="form-control baht" name="baht[]" id="baht" placeholder="" name="baht" value="<?php echo $row["baht"]; ?>"></td>
                          <td> <input type="text" class="form-control satang" name="satang[]" id="satang" placeholder="" name="satang" value="<?php echo $row["satang"]; ?>"></td>
                          <td> <input type="text" class="form-control place" name="place[]" id="place" placeholder="" name="place" value="<?php echo $row["place"]; ?>"></td>
                          <td> <input type="date" class="form-control receive_date" name="receive_date[]" id="receive_date" placeholder="" value="<?php echo $newrepairdate; ?>"></td>
                          <td><input type="text" class="form-control flag" name="flag[]" id="flag" placeholder="" name="flag" value="<?php echo $row["flag"]; ?>"></td>
                        </tr>

                      <?php
                      }
                      ?>
                      <tr class="text-center" height="30" id="firstTr">
                        <td> <input type="text" class="form-control seq" name="seq[]" id="seq" placeholder=""></td>
                        <td> <input type="text" class="form-control mileage_number" name="mileage_number[]" id="mileage_numberm" placeholder=""></td>
                        <td> <input type="text" class="form-control fix" name="fix[]" id="fix" placeholder="" name="fix"></td>
                        <td> <input type="text" class="form-control baht" name="baht[]" id="baht" placeholder="" name="baht"></td>
                        <td> <input type="text" class="form-control satang" name="satang[]" id="satang" placeholder="" name="satang"></td>
                        <td> <input type="text" class="form-control place" name="place[]" id="place" placeholder="" name="place"></td>
                        <td> <input type="date" class="form-control receive_date" name="receive_date[]" id="receive_date" placeholder=""></td>
                        <td><input type="text" class="form-control flag" name="flag[]" id="flag" placeholder="" name="flag"></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <table width="500" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <button id="addRow" type="button">+</button>
                        <button id="removeRow" type="button">-</button>
                      </td>
                    </tr>
                  </table>
                </div>

                <br>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn btn-block" data-toggle="modal" data-target="#exampleModal1">
                      ตกลง
                    </button>
                    <!-- Modal -->

                  </div>
                </div>
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
          <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
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
                    <h5 class="m-0 font-weight-bold text-danger">
                      <i class="fas fa-wrench"></i> แสดงข้อมูลการซ่อม(ครุภัณฑ์)</h5>
                    <form class="form-inline" id="form-search">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="input-search">
                      <div>
                        <button class="btn btn-outline-danger" type="submit">
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
                          <tr class="text-center body-text">
                            <th>วันที่ชำรุด</th>
                            <th>รหัสครุภัณฑ์</th>
                            <th>หมายเหตุ</th>
                            <th>การทำงาน</th>
                          </tr>
                        </thead>
                        <tbody id="modal-articles-body">
                          <?php

                          $sqlSelect = "SELECT da.*, a.code FROM durable_articles_damage as da, durable_articles as a";
                          $sqlSelect .= " WHERE da.product_id = a.id and da.status = 1";
                          if (isset($_GET["keyword"])) {
                            $keyword = arabicnumDigit($_GET["keyword"]);
                            $sqlSelect .= " and (da.damage_date like '%$keyword%' or a.code like '%$keyword%')";
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
                                <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedArticles(<?php echo $row["id"]; ?>);">
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
        url: 'service/service_search_json_durable_articles_damage.php?keyword=' + keyword,
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
        var picture = item["picture"];
        var seq = item["seq"];
        var bill_no = item["bill_no"];
        var code = item["code"];
        var flag = item["flag"];
        $('<td>' + item.damage_date + '</td>').appendTo(tr);
        $('<td>' + item.code + '</td>').appendTo(tr);
        $('<td>' + item.flag + '</td>').appendTo(tr);
        $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" onclick="selectedArticles(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
        generatePagination();
      }
    }

    function nextPage() {
      if (currentPage < maxPage) {
        currentPage = currentPage + 1;
        changePage(currentPage);

      }
    }

    function prevPage() {
      if (currentPage > 1) {
        currentPage = currentPage - 1;
        changePage(currentPage);
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
        $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 1) + ');">' + (i + 1) + '</a></li>').insertBefore($('#next-page'));
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
      $('#damage_id').val(id);
    }
    $(function() {
      $("#addRow").click(function() {
        //$("#myTbl").append($("#firstTr").clone());
        var tr = $('#myTbl tr:last').clone();
        $.each(tr.find("input"), function(i, e) {
          $(e).val("");
        });
        tr.appendTo($('#tbody'));
      });
      $("#removeRow").click(function() {
        // if ($("#myTbl tr").parents() > 1) {
        if ($("#myTbl tr").length > 3) {
          $("#myTbl tr:last").remove();
        }
        // } else {
        //   alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
        // }
      });
    });

    function sendData() {
      //var params = {};
      // params["seq"] = $('#seq').val();
      // params["repair_date"] = $('#repair_date').val();
      // params["damage_id"] = $('#damage_id').val();
      // params["place"] = $('#place').val();
      // params["flag"] = $('#flag').val();
      var data = [];
      $('.receive_date').each(function(i, e) {
        var item = {};
        item["id"] = $('.history_id:eq(' + i + ')').val();
        item["seq"] = $('.seq:eq(' + i + ')').val();
        item["mileage_number"] = $('.mileage_number:eq(' + i + ')').val();
        item["fix"] = $('.fix:eq(' + i + ')').val();
        item["baht"] = $('.baht:eq(' + i + ')').val();
        item["satang"] = $('.satang:eq(' + i + ')').val();
        item["place"] = $('.place:eq(' + i + ')').val();
        item["receive_date"] = $('.receive_date:eq(' + i + ')').val();
        item["flag"] = $('.flag:eq(' + i + ')').val();
        data.push(item);
      })
      // console.log(data);
      // params["data"] = data;
      $.ajax({
        url: 'service/service_edit_durable_articles_repair_history.php?id=<?php echo $_GET["id"]; ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {
          body: data
        },
        success: function(data) {
          console.log(data);
          if (data.result) {
            window.location = "display_durable_articles_repair.php";
          }
        },
        error: function(error) {
          console.log(error);
        }
      })
      //console.log(params);
    }

    function validateData() {
      var inputseq = $('#inputseq').val();
      var inputrepair_date = $('#inputrepair_date').val();
      var place = $('#place').val();
      var validateCount = 0;
      if ($.trim(inputseq) == "") {
        validateCount++;
        $('#inputseq').focus();
        $('#inputseq').addClass('border border-danger');
        $('#alert-inputseq').show();
      } else {
        $('#inputseq').removeClass('border border-danger');
        $('#alert-inputseq').hide();
      }
      if ($.trim(inputrepair_date) == "") {
        validateCount++;
        $('#inputrepair_date').addClass('border border-danger');
        $('#alert-inputrepair_date').show();
      } else {
        $('#inputrepair_date').removeClass('border border-danger');
        $('#alert-inputrepair_date').hide();
      }
      if ($.trim(place) == "") {
        validateCount++;
        $('#place').addClass('border border-danger');
        $('#alert-place').show();
      } else {
        $('#place').removeClass('border border-danger');
        $('#alert-place').hide();
      }
      if (validateCount > 0) {


      } else {
        $('#exampleModal').modal();
      }
    }
  </script>
</body>

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
        คุณต้องการแก้ไขข้อมูลรายการซ่อมครุภัณฑ์หรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        คุณต้องการเพิ่มข้อมูลรายการซ่อมครุภัณฑ์หรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="sendData();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>