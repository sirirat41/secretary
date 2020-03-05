<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT *,supplies_purchase.id as p ,s.price ,s.code FROM supplies as s ,supplies_purchase LEFT JOIN supplies ON supplies.id = supplies_purchase.product_id ";
  $sql .= "WHERE s.id = $id";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $receiveDate = $item["receive_date"];
  $orderDate = $item["purchase_date"];
  $newReceiveDate = date("Y-m-d", strtotime($receiveDate));
  $newOrderDate = date("Y-m-d", strtotime($orderDate));

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
  <secretary style="display: none">display_supplies</secretary>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/secretary.js"></script>



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
                  แก้ไขข้อมูล(วัสดุสิ้นเปลือง)
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_edit_supplies_purchase.php?id=<?php echo $id; ?>" id="form_insert" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                      <input class="form-control body-text" type="text" placeholder="order_no" name="order_no" id="order_no" value="<?php echo $item["order_no"]; ?>">
                      <small id="alert-order_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                      <input class="form-control body-text" type="date" placeholder="purchase_date" name="purchase_date" id="purchase_date" value="<?php echo $newOrderDate; ?>">
                      <small id="alert-purchase_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                      <input class="form-control body-text" type="text" placeholder="order_by" name="order_by" id="order_by" value="<?php echo $item["order_by"]; ?>">
                      <small id="alert-order_by" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label for="receiver">ชื่อผู้รับ</label>
                      <input type="text" class="form-control body-text" name="receiver" id="receiver" placeholder="receiver" value="<?php echo $item["receiver"]; ?>">
                      <small id="alert-receiver" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="receive_date">วันที่ตรวจรับ</label>
                      <input type="date" class="form-control body-text" name="receive_date" id="receive_date" placeholder="receive_date" value="<?php echo $newReceiveDate; ?>">
                      <small id="alert-receive_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="receive_address">สถานที่จัดส่ง</label>
                      <textarea class="form-control body-text" name="receive_address" id="receive_address" rows="3" placeholder="address" id="address"><?php echo $item["receive_address"]; ?></textarea>
                      <small id="alert-receive_address" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group bmd-form-group body-text">
                      <label class="bmd-label-floating">หน่วยงาน :</label>
                      <input class="form-control body-text" type="text" placeholder="short_goverment" name="short_goverment" id="short_goverment" value="<?php echo $item["short_goverment"]; ?>">
                      <small id="emailHelp" class="form-text text-danger body-text"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                      <small id="alert-short_goverment" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="bill_no">เลขที่ใบเบิก</label>
                      <input type="text" class="form-control body-text" name="bill_no" id="bill_no" aria-describedby="bill_no" placeholder="bill_no" value="<?php echo $item["bill_no"]; ?>">
                      <small id="alert-bill_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">หน่วยงาน</label>
                      <select class="form-control body-text" data-style="btn btn-link" id="exampleFormControlSelect1" name="department_id" value="<?php echo $item["department_id"]; ?>">
                        <?php
                        $sqlSelectType = "SELECT * FROM department";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          if ($item["department_id"] == $row["id"]) {
                            echo '<option value="' . $row["id"] . '"selected>' . $row["fullname"] . '</option>';
                          } else {
                            echo '<option value="' . $row["id"] . '">' . $row["fullname"] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group body-text">
                      <label for="price">จำนวนเงิน</label>
                      <input type="text" class="form-control body-text" name="price" id="price" aria-describedby="price" placeholder="price" value="<?php echo $item["price"]; ?>">
                      <small id="alert-price" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group body-text">
                      <label for="product_id">รหัสวัสดุ</label>
                      <input class="form-control body-text" name="product_id" type="text" placeholder="product_id" id="product_id" value="<?php echo $item["code"]; ?>" disabled>
                    </div></div>
                    <div class="col-5">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">จำนวนวัสดุ</label>
                      <input class="form-control body-text" type="text" placeholder="number" name="num" id="num" value="<?php echo $item["number"]; ?>">
                      <small id="alert-num" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                
            </div>
                
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label for="unit">หน่วยนับ</label>
                      <select class="form-control body-text" name="unit" value="<?php echo $item["unit"]; ?>">
                        <?php
                        $sqlSelectType = "SELECT * FROM unit";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          if ($item["unit"] == $row["id"]) {
                            echo '<option value="' . $row["id"] . '"selected>' . $row["name"] . '</option>';
                          } else {
                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">ชื่อผู้ขาย</label>
                      <select class="form-control body-text" data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id" value="<?php echo $item["seller_id"]; ?>">
                        <?php
                        $sqlSelectType = "SELECT * FROM seller";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          if ($item["seller_id"] == $row["id"]) {
                            echo '<option value="' . $row["id"] . '"selected>' . $row["name"] . '</option>';
                          } else {
                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-raised">
                        <img class="img-thumbnail" src="uploads/<?php echo $item["picture"]; ?>" align="center" alt="..." id="image-preview">
                      </div>
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                      <span class="btn btn-raised btn-round btn-default btn-file">
                        <br>
                        <div class="col-2 offset-1">
                          <input type="file" name="image" id="image" value="<?php echo $item["picture"]; ?>"/>
                        </div>
                      </span>
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


  <script>
    function search() {
      var kw = $("#keyword").val();
      $.ajax({
        url: 'service/service_search_json_supplies.php',
        dataType: 'JSON',
        type: 'GET',
        data: {
          keyword: kw
        },
        success: function(data) {
          console.log(data);
        },
        error: function(error) {
          console.log(error);
        }
      })
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
      var receiver = $('#receiver').val();
      var receive_date = $('#receive_date').val();
      var receive_address = $('#receive_address').val();
      var short_goverment = $('#short_goverment').val();
      var bill_no = $('#bill_no').val();
      var price = $('#price').val();
      var num = $('#num').val();
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
      if ($.trim(num) == "") {
        validateCount++;
        $('#num').addClass('border border-danger');
        $('#alert-num').show();
      } else {
        $('#num').removeClass('border border-danger');
        $('#alert-num').hide();
      }
      if (validateCount > 0) {


      } else {
        $('#exampleModal').modal();
      }
    //console.log(error);
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
        คุณต้องการบันทึกข้อมูลครุภัณฑ์หรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>