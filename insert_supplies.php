<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display: none">display_supplies</secretary>


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
        <div class="col-8 offset-2">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger body-text">
                  <i class="fas fa-fw fa-archive"></i>
                  เพิ่มข้อมูล(วัสดุสิ้นเปลือง)
                </h6>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="service/service_insert_supplies.php" id="form_insert" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="order_no">เลขที่ใบส่งของ</label>
                      <input type="text" class="form-control" name="order_no" id="order_no" placeholder="" autofocus id="order_no">
                      <small id="alert-order_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="purchase_date">วันที่จัดซื้อ</label>
                      <input type="date" class="form-control" name="purchase_date" id="purchase_date" placeholder="" id="purchase_date">
                      <small id="alert-purchase_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group body-text">
                      <label for="order_by">ชื่อผู้จัดซื้อ</label>
                      <input type="text" class="form-control" name="order_by" id="order_by" placeholder="" name="order_by" id="order_by">
                      <small id="alert-order_by" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">รหัสวัสดุสิ้นเปลือง :</label>
                      <input class="form-control" type="text" placeholder="" name="code" id="code">
                      <small id="alert-code" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label for="receiver">ชื่อผู้รับ</label>
                      <input type="text" class="form-control" name="receiver" id="receiver" placeholder="" id="receiver">
                      <small id="alert-receiver" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="receive_date">วันที่ตรวจรับ</label>
                      <input type="date" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date" id="receive_date">
                      <small id="alert-receive_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="receive_address">สถานที่จัดส่ง</label>
                      <textarea class="form-control" name="receive_address" id="receive_address" rows="3" placeholder="" id="address"></textarea>
                      <small id="alert-receive_address" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">หน่วยงาน :</label>
                      <input class="form-control" type="text" placeholder="" name="short_goverment" id="short_goverment">
                      <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                      <small id="alert-short_goverment" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="bill_no">เลขที่ใบเบิก</label>
                      <input type="text" class="form-control" name="bill_no" id="bill_no" aria-describedby="bill_no" placeholder="">
                      <small id="alert-bill_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">หน่วยงาน</label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="department_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM department";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["fullname"] . " " . $row["bulding"] . " " . $row["floor"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="supplies_id">ชื่อวัสดุ</label>
                      <div class="row">
                        <div class="col-md-10 ">
                          <select class="form-control" name="supplies_id" id="supplies_id">
                            <?php
                            $sqlSelectType = "SELECT * FROM supplies_stock WHERE status = 1";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              echo '<option value="' . $row["id"] . '">' . $row["supplies_name"] . '</option>';
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
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">หน่วยนับ :</label>
                      <select class="form-control" name="unit">
                        <?php
                        $sqlSelectType = "SELECT * FROM unit";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="price">จำนวนเงิน</label>
                      <input type="text" class="form-control" name="price" id="price" aria-describedby="price" placeholder="">
                      <small id="alert-price" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">จำนวนวัสดุ</label>
                      <input class="form-control" type="number" placeholder="" name="number" id="number">
                      <small id="alert-number" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">ชื่อผู้ขาย</label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM seller";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-4">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-raised">
                        <img class="img-thumbnail" src="https://brilliantplus.com/wp_main/wp-content/themes/brilliantplus/images/agent/noimage.png" alt="..." id="image-preview">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                      <div>
                        <span class="btn btn-raised btn-round btn-default btn-file">

                          <div class="col-2">
                            <input type="file" name="image" id="image" />
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn btn-block body-text" onclick="validateData();">
                      บันทึก
                      <div class="ripple-container"></div></button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- สิ้นสุดการเขียนตรงนี้ -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <br>
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
        <div class="modal-body text-left">
          <div class="row">
            <div class="col-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger body-text">
                      <i class="fas fa-business-time"></i> แสดงข้อมูล(วัสดุสิ้นเปลือง)</h6>
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
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-hover ">
                      <thead>
                        <tr class="text-center body-text">
                          <td>ชื่อ</td>
                          <td>จำนวน</td>
                          <td>การทำงาน</td>
                        </tr class="text-center">
                      </thead>
                      <tbody id="modal-supplies-body">
                        <!-- ///ดึงข้อมูล -->
                        <?php
                        //$page = isset($_GET["page"]) ? $_GET["page"] : 1;
                        $sqlSelect = "SELECT * FROM supplies_stock ";
                        $sqlSelect .= " WHERE status = 1";
                        // $sqlSelect = "SELECT * FROM supplies_stock as ss,supplies as s";
                        // $sqlSelect .= " WHERE s.supplies_id = ss.id and s.status = 1";
                        if (isset($_GET["keyword"])) {
                          $keyword = arabicnumDigit($_GET["keyword"]);
                          $sqlSelect .= " and (stock like '%$keyword%' or supplies_name like '%$keyword%')";
                        }
                        // echo $sqlSelect;
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"]
                        ?>
                          <tr class="text-center body-text">
                            <td><?php echo ($row["stock"]); ?></td>
                            <td><?php echo ($row["supplies_name"]); ?></td>
                            <td class="td-actions text-center">
                              <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedsupplies(<?php echo $row["id"]; ?>);">
                                <i class="fas fa-check"></i>
                              </button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    </form>
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
        url: 'service/service_search_json_supplies_stock.php?keyword=' + keyword,
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
    $(document).ready(function() {
      <?php
      if (isset($_GET["message"])) {
        $message = $_GET["message"];
        echo "alert('$message');";
      }
      ?>
    })

    function changePage(page) {
      currentPage = page;

      var body = $('#modal-supplies-body');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const item = jsonData[i];
        //console.log(item);
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var name = item["supplies_name"];
        var stock = item["stock"];
        $('<td>' + (name) + '</td>').appendTo(tr);
        $('<td>' + (stock) + '</td>').appendTo(tr);
        $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success"onclick="selectedsupplies(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);


      }
      generatePagination();
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

    function selectedsupplies(id) {
      $('#modal-form-search').modal('hide');
      $('#supplies_id').val(id);
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#image").change(function() {
      readURL(this);
    });

    function validateData() {
      var order_no = $('#order_no').val();
      var purchase_date = $('#purchase_date').val();
      var order_by = $('#order_by').val();
      var code = $('#code').val();
      var receiver = $('#receiver').val();
      var receive_date = $('#receive_date').val();
      var receive_address = $('#receive_address').val();
      var short_goverment = $('#short_goverment').val();
      var bill_no = $('#bill_no').val();
      var price = $('#price').val();
      var number = $('#number').val();
      var validateCount = 0;
      if ($.trim(order_no) == "") {
        validateCount++;
        $('#order_no').focus();
        $('#order_no').addClass('border border-danger');
        $('#alert-order_no').show();
      } else {
        $('#order_no').removeClass('border border-danger');
        $('#alert-order_no').hide();
      }
      if ($.trim(purchase_date) == "") {
        validateCount++;
        $('#purchase_date').addClass('border border-danger');
        $('#alert-purchase_date').show();
      } else {
        $('#purchase_date').removeClass('border border-danger');
        $('#alert-purchase_date').hide();
      }
      if ($.trim(order_by) == "") {
        validateCount++;
        $('#order_by').addClass('border border-danger');
        $('#alert-order_by').show();
      } else {
        $('#order_by').removeClass('border border-danger');
        $('#alert-order_by').hide();
      }
      if ($.trim(code) == "") {
        validateCount++;
        $('#code').addClass('border border-danger');
        $('#alert-code').show();
      } else {
        $('#code').removeClass('border border-danger');
        $('#alert-code').hide();
      }
      if ($.trim(receiver) == "") {
        validateCount++;
        $('#receiver').addClass('border border-danger');
        $('#alert-receiver').show();
      } else {
        $('#receiver').removeClass('border border-danger');
        $('#alert-receiver').hide();
      }
      if ($.trim(receive_date) == "") {
        validateCount++;
        $('#receive_date').addClass('border border-danger');
        $('#alert-receive_date').show();
      } else {
        $('#receive_date').removeClass('border border-danger');
        $('#alert-receive_date').hide();
      }
      if ($.trim(receive_address) == "") {
        validateCount++;
        $('#receive_address').addClass('border border-danger');
        $('#alert-receive_address').show();
      } else {
        $('#receive_address').removeClass('border border-danger');
        $('#alert-receive_address').hide();
      }
      if ($.trim(short_goverment) == "") {
        validateCount++;
        $('#short_goverment').addClass('border border-danger');
        $('#alert-short_goverment').show();
      } else {
        $('#short_goverment').removeClass('border border-danger');
        $('#alert-short_goverment').hide();
      }
      if ($.trim(bill_no) == "") {
        validateCount++;
        $('#bill_no').addClass('border border-danger');
        $('#alert-bill_no').show();
      } else {
        $('#bill_no').removeClass('border border-danger');
        $('#alert-bill_no').hide();
      }
      if ($.trim(price) == "") {
        validateCount++;
        $('#price').addClass('border border-danger');
        $('#alert-price').show();
      } else {
        $('#price').removeClass('border border-danger');
        $('#alert-price').hide();
      }
      if ($.trim(number) == "") {
        validateCount++;
        $('#number').addClass('border border-danger');
        $('#alert-number').show();
      } else {
        $('#number').removeClass('border border-danger');
        $('#alert-number').hide();
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
        <h4 class="modal-title" id="exampleModalLabel">แจ้งเตือน </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-text">
        คุณต้องการบันทึกข้อมูลวัสดุหรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>