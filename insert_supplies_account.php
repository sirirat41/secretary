<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>secretary</title>
<secretary style="display : none">display_supplies_account</secretary>

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
      <div class="row ">
        <div class="col-6 offset-3">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-file-invoice-dollar"></i>
                  เพิ่มข้อมูลบัญชีคุมวัสดุ
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_insert_supplies_account.php" id="form_insert">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="year">ปีงบประมาณ</label>
                      <input type="text" class="form-control" name="year" id="year" placeholder="year" name="year">
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-group bmd-form-group">
                      <label for="supplies_id">ชื่อวัสดุ</label>
                      <select class="form-control" name="supplies_id" id="supplies_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM supplies_stock";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["supplies_name"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label for="product_id">รหัสวัสดุ</label>
                      <div class="row">
                        <div class="col-md-10">
                          <select class="form-control" name="product_id" id="product_id">
                            <?php
                            $sqlSelectType = "SELECT * FROM supplies";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              echo '<option value="' . $row["id"] . '">' . $row["code"] . '</option>';
                            }
                            ?>
                          </select>
                        </div>

                        <div class="col-md-1">
                          <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-form-search" onclick="search()">
                            <i class="fas fa-search"></i>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">


                  <div class="col-4">
                    <div class="form-group bmd-form-group">
                      <label for="unit_id">หน่วยนับ</label>
                      <select class="form-control" name="unit_id" id="unit_id">
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
                  <div class="col-8">
                    <div class="form-group bmd-form-group">
                      <label for="department">หน่วยงานที่เก็บ</label>
                      <select class="form-control" name="department" id="department">
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

                <br>



            </div>
          </div>
        </div>
      </div>
      <br>

      <div class="row ">
        <div class="col-12">
          <div class="card">


            <div class="card-body">
              <div class="table-responsive">
                <table class='border-color-gray' align="center" cellpadding="10" cellspacing="10" border="1" width="100%" id="myTbl">
                  <thead>
                    <tr class="text-center">
                      <td rowspan="2">วัน/เดือน/ปี</td>
                      <td rowspan="2">รับจาก</td>
                      <td rowspan="2">จ่ายให้</td>
                      <td rowspan="2">เลขที่เอกสาร</td>
                      <td colspan="2" width="15%" height="10">ราคาต่อหน่วย</td>
                      <td rowspan="2">หน่วยนับ</td>
                      <td colspan="3">จำนวน</td>
                      <td rowspan="2">หมายเหตุ</td>
                    </tr>
                    <tr class="text-center">
                      <td width="8%">บาท </td>
                      <td width="6%">สตางค์</td>
                      <td width="7%">รับ</td>
                      <td width="7%">จ่าย</td>
                      <td width="7%">คงเหลือ</td>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <tr class="text-center" height="30" id="firstTr">
                      <td> <input type="date" class="form-control distribute_date" name="distribute_date[]" id="distribute_date" placeholder=""></td>
                      <td> <input type="text" class="form-control receive_from" name="receive_from[]" id="receive_from" placeholder=""></td>
                      <td> <input type="text" class="form-control distribute_to" name="distribute_to[]" id="distribute_to" placeholder="" name="distribute_to"></td>
                      <td> <input type="text" class="form-control document_no" name="document_no[]" id="document_no" placeholder="" name="document_no"></td>
                      <td> <input type="text" class="form-control baht" name="baht[]" id="baht" placeholder="" name="baht"></td>
                      <td> <input type="text" class="form-control satang" name="satang[]" id="satang" placeholder="" name="satang"></td>
                      <td> <input type="text" class="form-control unit" name="unit[]" id="unit" placeholder="" name="unit"></td>
                      <td> <input type="text" class="form-control receive" name="receive[]" id="receive" placeholder="" name="receive"></td>
                      <td> <input type="text" class="form-control table-distribute" name="distribute[]" id="distribute" placeholder="" name="distribute"></td>
                      <td> <input type="text" class="form-control table-stock" name="stock[]" id="stock" placeholder=""></td>
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
                  <button type="button" class="btn btn-danger btn btn-block" data-toggle="modal" data-target="#exampleModal">
                    ตกลง
                  </button>
                  <!-- Modal -->

                </div>
              </div>
            </div>
          </div>
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
          <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          คุณต้องการบันทึกข้อมูลบัญชีคุม(วัสดุ)หรือไม่ ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger" onclick="sendData();">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
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
                    <h6 class="m-0 font-weight-bold text-danger">
                      <i class="fas fa-business-time"></i> แสดงข้อมูล(วัสดุคงทน)</h6>
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
                        <tr class="text-center">
                          <td>รูปภาพ</td>
                          <td>ชื่อวัสดุ</td>
                          <td>รหัสวัสดุ</td>
                          <td>ประเภท</td>
                          <td>การทำงาน</td>
                        </tr class="text-center">
                      </thead>
                      <tbody id="modal-supplies-body">
                        <!-- ///ดึงข้อมูล -->
                        <?php
                        //$page = isset($_GET["page"]) ? $_GET["page"] : 1;


                        $sqlSelect = "SELECT a.*, t.name,s.supplies_name,s.type,s.attribute FROM supplies as a, supplies_stock as s ,durable_material_type as t";
                        $sqlSelect .= " WHERE a.supplies_id = s.id and s.type = t.id and a.status = 1 ";
                        if (isset($_GET["keyword"])) {
                          $keyword = arabicnumDigit($_GET["keyword"]);
                          $sqlSelect .= " and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or t.name like '%$keyword%')";
                        }
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"]
                          ?>
                          <tr class="text-center">
                            <td><img class="img-thumbnail" width="100px" src="uploads/<?php echo $row["picture"]; ?>"></td>
                            <td><?php echo thainumDigit($row["supplies_name"]); ?></td>
                            <td><?php echo thainumDigit($row["code"]); ?></td>
                            <td><?php echo thainumDigit($row["name"]); ?></td>
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
        url: 'service/service_search_json_supplies.php?keyword=' + keyword,
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

      var body = $('#modal-supplies-body');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const item = jsonData[i];
        //console.log(item);
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var picture = item["picture"];
        var supplies_name = item["supplies_name"];
        var code = item["code"];
        var type = item["name"];
        $('<td><img class="img-thumbnail" width="100px" src="uploads/' + picture + '"></td>').appendTo(tr);
        $('<td>' + thaiNumber(supplies_name) + '</td>').appendTo(tr);
        $('<td>' + thaiNumber(code) + '</td>').appendTo(tr);
        $('<td>' + thaiNumber(type) + '</td>').appendTo(tr);
        $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success"onclick="selectedsupplies(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
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

    function selectedsupplies(id) {
      $('#modal-form-search').modal('hide');
      $('#product_id').val(id);
    }

    $(function() {
      $("#addRow").click(function() {
        //$("#myTbl").append($("#firstTr").clone());
        var tr = $('#myTbl tr:last').clone();
        $.each(tr.find("input"), function(i,e) {
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
      var params = {};
      params["year"] = $('#year').val();
      params["supplies_id"] = $('#supplies_id').val();
      params["product_id"] = $('#product_id').val();
      params["unit_id"] = $('#unit_id').val();
      params["department"] = $('#department').val();
      var data = [];
      $('.distribute_date').each(function(i, e) {
        var item = {};
        item["distribute_date"] = $('.distribute_date:eq(' + i + ')').val();
        item["receive_from"] = $('.receive_from:eq(' + i + ')').val();
        item["distribute_to"] = $('.distribute_to:eq(' + i + ')').val();
        item["document_no"] = $('.document_no:eq(' + i + ')').val();
        item["baht"] = $('.baht:eq(' + i + ')').val();
        item["satang"] = $('.satang:eq(' + i + ')').val();
        item["unit"] = $('.unit:eq(' + i + ')').val();
        item["receive"] = $('.receive:eq(' + i + ')').val();
        item["distribute"] = $('.table-distribute:eq(' + i + ')').val();
        item["stock"] = $('.table-stock:eq(' + i + ')').val();
        item["flag"] = $('.flag:eq(' + i + ')').val();
        data.push(item);
      })
      params["data"] = data;
      $.ajax({
        url: 'service/service_insert_supplies_account.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          body: params
        }, success: function(data) {
          if (data.result) {
            window.location = "display_supplies_account.php";
          }
        }
      })
      //console.log(params);
    }
  </script>
</body>

</html>