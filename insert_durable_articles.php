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
  <secretary style="display : none">display_durable_articles</secretary>
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
        <div class="col-8 offset-2">
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
              <form method="post" action="service/service_insert_durable_articles.php" id="form_insert">
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                      <input class="form-control" type="text" placeholder="order_no" name="order_no">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                      <input class="form-control" type="date" placeholder="purchase_date" name="purchase_date">

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                      <input class="form-control" type="text" placeholder="order_by" name="order_by">
                    </div>
                    <div class="col-6 ">
                      <div class="form-group body-text">
                        <label class="bmd-label-floating">เลขที่เอกสาร :</label>
                        <input class="form-control" type="text" placeholder="document_no" name="document_no">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">ชื่อผู้รับ :</label>
                      <input class="form-control" type="text" placeholder="receiver" name="receiver">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group body-text">
                      <label for="receive_date">วันที่ตรวจรับ</label>
                      <input type="date" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date" name="receive_date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="receive_address">สถานที่จัดส่ง</label>
                      <textarea class="form-control" name="receive_address" id="receive_address" rows="3" placeholder="address"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">หน่วยงาน :</label>
                      <input class="form-control" type="text" placeholder="short_goverment" name="short_goverment">
                      <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">ประเภทครุภัณฑ์ : </label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="type">
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
                      <input class="form-control" type="text" placeholder="attribute" name="attribute">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">รุ่นแบบ :</label>
                      <input class="form-control" type="text" placeholder="model" name="model">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">เลขที่ใบเบิก :</label>
                      <input class="form-control" type="text" placeholder="bill_no" name="bill_no">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">งบประมาณ :</label>
                      <input class="form-control" type="text" placeholder="budget" name="budget">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">หน่วยงานที่รับผิดชอบ :</label>
                      <select class="form-control" name="department_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM department";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["fullname"] . '</option>';
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
                      <input class="form-control" type="text" placeholder="asset_no" name="asset_no">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">เอกสารสำรองเงิน :</label>
                      <input class="form-control" type="text" placeholder="D-GEN" name="d_gen">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">เลขที่หนังสือ :</label>
                      <input class="form-control" type="text" placeholder="book_no" name="book_no">
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="exampleFormControlSelect1" class="body-text">ร้านค้า : </label>
                    <select class="form-control" name="seller_id">
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
                    <div class="form-group">
                      <label class="bmd-label-floating" class="body-text">หน่วยนับ :</label>
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
                      <label class="bmd-label-floating">จำนวนเงิน :</label>
                      <input class="form-control" type="text" placeholder="price" name="price">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label for="exampleFormControlSelect1">จำนวนปีของครุภัณฑ์ :</label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="durable_year">
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
                      <input class="form-control" type="text" placeholder="storage" name="storage">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">จำนวนครุภัณฑ์ :</label>
                      <input class="form-control" type="text" placeholder="number">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group body-text">
                      <label class="bmd-label-floating">ประเภทเงิน :</label>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="	money_type" id="inlineRadio1" value="เงินงบประมาณ"> เงินงบประมาณ
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
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
                        <label class="form-check-label ">
                          <input class="form-check-input body-text" type="radio" name="money_type" id="inlineRadio4" value="อื่นๆ"> อื่นๆ
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group body-text">
                            <label class="bmd-label-floating">วิธีการได้มา :</label>
                            <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio1" value="เฉพาะเจาะจง"> เฉพาะเจาะจง
                                <span class="circle">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                            <div class="form-checFk form-check-radio form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input body-text" type="radio" name="acquiring" id="inlineRadio2" value="ประกวดราคา"> ประกวดราคา
                                <span class="circle">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input body-text" type="radio" name="acquiring" id="inlineRadio3" value="ประกาศเชิญชวนทั่วไป"> ประกาศเชิญชวนทั่วไป
                                <span class="circle">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input body-text" type="radio" name="acquiring" id="inlineRadio4" value="รับบริจาค"> รับบริจาค
                                <span class="circle">
                                  <span class="check"></span>
                                </span>
                              </label>
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
                                <button type="button" class="btn btn-danger btn btn-block body-text" data-toggle="modal" data-target="#exampleModal">
                                  บันทึก
                                  <div class="ripple-container"></div>
                                </button>
                                <!-- Modal -->
                             
                              </div>
                            </div>
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
        <!-- สิ้นสุดการเขียนตรงนี้ -->
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <br>
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



</body>
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