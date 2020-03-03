<?php
require "service/connection.php";
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
  <secretary style="display: none">display_durable_articles_purchase</secretary>

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
      <div class="row "></div>
      <div class="col-10 offset-1">
        <div class="card">
          <div class="card-header card-header-text card-header-danger">
            <div class="card-text">
              <h6 class="m-0 font-weight-bold text-danger body-text">
                <i class="fas fa-fw fa-cubes"></i>
                เพิ่มข้อมูล(ครุภัณฑ์)
              </h6>
            </div>
          </div>
          <br>
          <div class="card-body">
            <form method="post" action="service/service_insert_durable_articles.php" id="form_insert" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 ">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                    <input class="form-control body-text" type="text" placeholder="order_no" name="order_no" id="order_no">
                    <small id="alert-order_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6 ">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                    <input class="form-control body-text" type="date" placeholder="purchase_date" name="purchase_date" id="purchase_date">
                    <small id="alert-purchase_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">ชื่อผู้จัดซื้อ</label>
                    <input type="text" class="form-control body-text" name="order_by" id="order_by" placeholder="order_by" value="<?php echo $_SESSION["fullname"]; ?>">
                    <small id="alert-order_by" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6 ">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">เลขที่เอกสาร :</label>
                    <input class="form-control body-text" type="number" placeholder="document_no" name="document_no" id="document_no">
                    <small id="alert-document_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 ">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">รหัสครุภัณฑ์ตั้งต้น :</label>
                    <input class="form-control body-text" type="text" placeholder="รหัสครุภัณฑ์ตั้งต้น" name="articles_pattern">
                    <small style="color: red"> *ตัวอย่าง: ค.สนง 7700-100-{run_4}-3-2557</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 ">
                  <div class="form-group body-text">
                    <label for="receiver">ชื่อผู้รับ</label>
                    <input type="text" class="form-control body-text" name="receiver" id="receiver" placeholder="receiver" value="<?php echo $_SESSION["fullname"]; ?>">
                    <small id="alert-receiver" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6 ">
                  <div class="form-group body-text">
                    <label for="receive_date">วันที่ตรวจรับ</label>
                    <input type="date" class="form-control body-text" name="receive_date" id="receive_date" placeholder="receive_date" name="receive_date">
                    <small id="alert-receive_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group body-text">
                    <label for="receive_address">สถานที่จัดส่ง</label>
                    <textarea class="form-control body-text" name="receive_address" id="receive_address" rows="3" placeholder="address"></textarea>
                    <small id="alert-receive_address" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">หน่วยงาน :</label>
                    <input class="form-control body-text" type="text" placeholder="short_goverment" name="short_goverment" id="short_goverment">
                    <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                    <small id="alert-short_goverment" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group body-text">
                    <label for="exampleFormControlSelect1">ประเภทครุภัณฑ์ : </label>
                    <select class="form-control body-text" data-style="btn btn-link" id="exampleFormControlSelect1" name="type">
                      <?php
                      $sqlSelectType = "SELECT * FROM durable_articles_type";
                      $resultType = mysqli_query($conn, $sqlSelectType);
                      while ($row = mysqli_fetch_assoc($resultType)) {
                        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">ลักษณะ/คุณสมบัติ :</label>
                    <input class="form-control body-text" type="text" placeholder="attribute" name="attribute" id="attribute">
                    <small id="alert-attribute" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">รุ่นแบบ :</label>
                    <input class="form-control body-text" type="text" placeholder="model" name="model" id="model">
                    <small id="alert-model" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">เลขที่ใบเบิก :</label>
                    <input class="form-control body-text" type="text" placeholder="bill_no" name="bill_no" id="bill_no">
                    <small id="alert-bill_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">งบประมาณ :</label>
                    <input class="form-control body-text" type="text" placeholder="budget" name="budget" id="budget">
                    <small id="alert-budget" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">หน่วยงานที่รับผิดชอบ :</label>
                    <select class="form-control body-text" name="department_id">
                      <?php
                      $sqlSelectType = "SELECT * FROM department";
                      $resultType = mysqli_query($conn, $sqlSelectType);
                      while ($row = mysqli_fetch_assoc($resultType)) {
                        echo '<option value="' . $row["id"] . '">' . "อาคาร " . $row["bulding"] . "ชั้น " . $row["floor"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">เลขสินทรัพย์ :</label>
                    <input class="form-control body-text" type="text" placeholder="เลขสินทรัพย์" name="asset_no" id="asset_no">
                    <small style="color: red"> *ตัวอย่าง:100000312000</small>
                    <small id="alert-asset_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">เอกสารสำรองเงิน :</label>
                      <input class="form-control" type="text" placeholder="D-GEN" name="d_gen" id="d_gen">
                      <small id="alert-d_gen" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label class="body-text" for="exampleFormControlSelect1">ชื่อผู้ขาย : </label>
                  <select class="form-control body-text" name="seller_id">
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
              <br>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">หน่วยนับ :</label>
                    <select class="form-control body-text" name="unit">
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
                    <label class="bmd-label-floating">จำนวนเงิน :</label>
                    <input class="form-control body-text" type="number" placeholder="price" name="price" id="price">
                    <small id="alert-price" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label for="exampleFormControlSelect1">จำนวนปีของครุภัณฑ์ :</label>
                    <select class="form-control body-text" data-style="btn btn-link" id="exampleFormControlSelect1" name="durable_year">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group bmd-form-group body-text">
                    <label class="bmd-label-floating">ห้องเก็บครุภัณฑ์ :</label>
                    <input class="form-control body-text" type="text" placeholder="storage" name="storage" id="storage">
                    <small id="alert-storage" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">จำนวนครุภัณฑ์ :</label>
                    <input class="form-control body-text" type="number" placeholder="number" name="number" id="number">
                    <small id="alert-number" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group body-text">
                    <label class="bmd-label-floating">ประเภทเงิน :</label>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input body-text" type="radio" name="money_type" id="inlineRadio1" value="เงินงบประมาณ"> เงินงบประมาณ
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label body-text">
                        <input class="form-check-input body-text" type="radio" name="money_type" id="inlineRadio2" value="เงินนอกงบประมาณ"> เงินนอกงบประมาณ
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input body-text" type="radio" name="money_type" id="inlineRadio3" value="เงินบริจาค/เงินช่วยเหลือ"> เงินบริจาค/เงินช่วยเหลือ
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input body-text" type="radio" name="money_type" id="inlineRadio4" value="อื่นๆ"> อื่นๆ
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label class="bmd-label-floating body-text">วิธีการได้มา :</label>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input body-text" type="radio" name="acquiring" id="inlineRadio1" value="เฉพาะเจาะจง"> เฉพาะเจาะจง
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label body-text">
                        <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio2" value="ประกวดราคา"> ประกวดราคา
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label body-text">
                        <input class="form-check-input body-text" type="radio" name="acquiring" id="inlineRadio3" value="ประกาศเชิญชวนทั่วไป"> ประกาศเชิญชวนทั่วไป
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label body-text">
                        <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio4" value="รับบริจาค"> รับบริจาค
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <br>
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
                    <div class="ripple-container"></div>
                  </button>

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


  <script>
    function search() {
      var kw = $("#keyword").val();
      $.ajax({
        url: 'service/service_search_json_durables_articles.php',
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
    $(document).ready(function() {
      $('#asset_no').focusout(function() {
        var assetNo = $('#asset_no').val();
        $.ajax({
          url: 'service/service_check.php',
          dataType: 'JSON',
          type: 'POST',
          data: {
            asset_no: assetNo
          },
          success: function(data) {
            if (!data.result) {
              alert("มีข้อมูลซ้ำ" + data.data);
            }
            console.log(data);
          },
          error: function(error) {
            console.log(error);
          }

        })

      })
    })

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
      var document_no = $('#document_no').val();
      var receiver = $('#receiver').val();
      var receive_date = $('#receive_date').val();
      var receive_address = $('#receive_address').val();
      var short_goverment = $('#short_goverment').val();
      var attribute = $('#attribute').val();
      var model = $('#model').val();
      var bill_no = $('#bill_no').val();
      var budget = $('#budget').val();
      var asset_no = $('#asset_no').val();
      var d_gen = $('#d_gen').val();
      var price = $('#price').val();
      var storage = $('#storage').val();
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
      if ($.trim(document_no) == "") {
        validateCount++;
        $('#document_no').addClass('border border-danger');
        $('#alert-document_no').show();
      } else {
        $('#document_no').removeClass('border border-danger');
        $('#alert-document_no').hide();
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
      if ($.trim(attribute) == "") {
        validateCount++;
        $('#attribute').addClass('border border-danger');
        $('#alert-attribute').show();
      } else {
        $('#attribute').removeClass('border border-danger');
        $('#alert-attribute').hide();
      }
      if ($.trim(model) == "") {
        validateCount++;
        $('#model').addClass('border border-danger');
        $('#alert-model').show();
      } else {
        $('#model').removeClass('border border-danger');
        $('#alert-model').hide();
      }
      if ($.trim(bill_no) == "") {
        validateCount++;
        $('#bill_no').addClass('border border-danger');
        $('#alert-bill_no').show();
      } else {
        $('#bill_no').removeClass('border border-danger');
        $('#alert-bill_no').hide();
      }
      if ($.trim(budget) == "") {
        validateCount++;
        $('#budget').addClass('border border-danger');
        $('#alert-budget').show();
      } else {
        $('#budget').removeClass('border border-danger');
        $('#alert-budget').hide();
      }
      if ($.trim(asset_no) == "") {
        validateCount++;
        $('#asset_no').addClass('border border-danger');
        $('#alert-asset_no').show();
      } else {
        $('#asset_no').removeClass('border border-danger');
        $('#alert-asset_no').hide();
      }
      if ($.trim(d_gen) == "") {
        validateCount++;
        $('#d_gen').addClass('border border-danger');
        $('#alert-d_gen').show();
      } else {
        $('#d_gen').removeClass('border border-danger');
        $('#alert-d_gen').hide();
      }
      if ($.trim(price) == "") {
        validateCount++;
        $('#price').addClass('border border-danger');
        $('#alert-price').show();
      } else {
        $('#price').removeClass('border border-danger');
        $('#alert-price').hide();
      }
      if ($.trim(storage) == "") {
        validateCount++;
        $('#storage').addClass('border border-danger');
        $('#alert-storage').show();
      } else {
        $('#storage').removeClass('border border-danger');
        $('#alert-storage').hide();
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

<!-- Modal -->
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
        คุณต้องการบันทึกข้อมูลครุภัณฑ์หรือไม่ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>