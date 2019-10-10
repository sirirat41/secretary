<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT *,durable_articles_purchase.id as pid FROM durable_articles LEFT JOIN durable_articles_purchase ON durable_articles.id = durable_articles_purchase.product_id ";
  $sql .= "WHERE durable_articles.id = $id ";
  $result = mysqli_query($conn, $sql) or die('cannot select data');
  $item = mysqli_fetch_assoc($result);
  $receiveDate = $item["receive_date"];
  $orderDate = $item["purchase_date"];
  $newReceiveDate = date("Y-m-d", strtotime($receiveDate));
  $newOrderDate = date("d-m-Y", strtotime($orderDate));

  //item.code java odject , item["code"] php

  // $sql = "SELECT * FROM durable_articles a, durable_articles_type t, department d WHERE id = $id and a.department = d.id";
  // $sql .= " and a.type = t.id";
  // $result = mysqli_query($conn,$sql);
  // $row = mysqli_fetch_assoc($result); // .ใช้สำหรับหน้า View
}
?>

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
        <div class="col-8 offset-2">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-fw fa-cubes"></i>
                  เพิ่มข้อมูลครุภัณฑ์
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_edit_durable_articles_purchase.php?id=<?php echo $id; ?>" id="form_insert" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                      <input class="form-control" type="text" placeholder="order_no" name="order_no" value="<?php echo $item["order_no"]; ?>">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                      <input class="form-control" type="date" placeholder="purchase_date" name="purchase_date" value="<?php echo $newOrderDate; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                      <input class="form-control" type="text" placeholder="order_by" name="order_by" value="<?php echo $item["order_by"]; ?>">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">เลขที่เอกสาร :</label>
                      <input class="form-control" type="text" placeholder="document_no" name="document_no" value="<?php echo $item["document_no"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">รหัสครุภัณฑ์ตั้งต้น :</label>
                      <input class="form-control" type="text" placeholder="รหัสครุภัณฑ์ตั้งต้น" name="articles_pattern" value="<?php echo $item["code"]; ?>">
                      <small style="color: red"> *ตัวอย่าง: ค.สง 7700-100-{run_4}-2557</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อผู้รับ :</label>
                      <input class="form-control" type="text" placeholder="receiver" name="receiver" value="<?php echo $item["receiver"]; ?>">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group">
                      <label for="receive_date">วันที่ตรวจรับ</label>
                      <input type="date" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date" value="<?php echo $newReceiveDate; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group ">
                      <label for="receive_address">สถานที่จัดส่ง</label>
                      <textarea class="form-control" name="receive_address" id="receive_address" rows="3" placeholder="address"><?php echo $item["receive_address"]; ?>
                  </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">หน่วยงาน :</label>
                      <input class="form-control" type="text" placeholder="short_goverment" name="short_goverment" value="<?php echo $item["short_goverment"]; ?>">
                      <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">ประเภทครุภัณฑ์ : </label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="type" value="<?php echo $item["type"]; ?>">
                        <?php
                        $sqlSelectType = "SELECT * FROM durable_articles_type";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          if ($item["type"] == $row["id"]) {
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
                    <div class="form-group">
                      <label class="bmd-label-floating">ลักษณะ/คุณสมบัติ :</label>
                      <input class="form-control" type="text" placeholder="attribute" name="attribute" value="<?php echo $item["attribute"]; ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">รุ่นแบบ :</label>
                      <input class="form-control" type="text" placeholder="model" name="model" value="<?php echo $item["model"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">เลขที่ใบเบิก :</label>
                      <input class="form-control" type="text" placeholder="bill_no" name="bill_no" value="<?php echo $item["bill_no"]; ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">งบประมาณ :</label>
                      <input class="form-control" type="text" placeholder="budget" name="budget" value="<?php echo $item["budget"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">หน่วยงานที่รับผิดชอบ :</label>
                      <select class="form-control" name="department_id" value="<?php echo $item["department_id"]; ?>">
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
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">เลขสินทรัพย์ :</label>
                      <input class="form-control" type="text" placeholder="asset_no" name="asset_no" value="<?php echo $item["asset_no"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label class="bmd-label-floating">เอกสารสำรองเงิน :</label>
                        <input class="form-control" type="text" placeholder="d_gen" name="d_gen" id="d_gen" value="<?php echo $item["d_gen"]; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="exampleFormControlSelect1">ชื่อผู้ขาย : </label>
                    <select class="form-control" name="seller_id">
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
                <br>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">หน่วยนับ :</label>
                      <select class="form-control" name="unit" value="<?php echo $item["unit"]; ?>">
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
                    <div class="form-group">
                      <label class="bmd-label-floating">จำนวนเงิน :</label>
                      <input class="form-control" type="text" placeholder="price" name="price" value="<?php echo $item["price"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">จำนวนปีของครุภัณฑ์ :</label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="durable_year" name="durable_year" value="<?php echo $item["durable_year"]; ?>">
                        <?php
                        for ($i = 0; $i <= 10; $i++) {
                          if ($item["durable_year"] == $i) {
                            echo "<option value='$i' selected>$i</option>";
                          } else {
                            echo "<option value='$i'>$i</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">ห้องเก็บครุภัณฑ์ :</label>
                      <input class="form-control" type="text" placeholder="storage" name="storage" value="<?php echo $item["storage"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ประเภทเงิน :</label>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="money_type" id="inlineRadio1" value="เงินงบประมาณ" <?php if ($item["money_type"] == "เงินงบประมาณ") echo "checked" ?>> เงินงบประมาณ
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="money_type" id="inlineRadio2" value="เงินนอกงบประมาณ" <?php if ($item["money_type"] == "เงินนอกงบประมาณ") echo "checked" ?>> เงินนอกงบประมาณ
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="money_type" id="inlineRadio3" value="เงินบริจาค/เงินช่วยเหลือ" <?php if ($item["money_type"] == "เงินบริจาค/เงินช่วยเหลือ") echo "checked" ?>> เงินบริจาค/เงินช่วยเหลือ
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="money_type" id="inlineRadio4" value="อื่นๆ" <?php if ($item["money_type"] == "อื่นๆ") echo "checked" ?>> อื่นๆ
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
                  <div class="col-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">วิธีการได้มา :</label>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio1" value="เฉพาะเจาะจง" <?php if ($item["acquiring"] == "เฉพาะเจาะจง") echo "checked" ?>> เฉพาะเจาะจง
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio2" value="ประกวดราคา" <?php if ($item["acquiring"] == "ประกวดราคา") echo "checked" ?>> ประกวดราคา
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio3" value="ประกาศเชิญชวนทั่วไป" <?php if ($item["acquiring"] == "ประกาศเชิญชวนทั่วไป") echo "checked" ?>> ประกาศเชิญชวนทั่วไป
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="acquiring" id="inlineRadio4" value="รับบริจาค" <?php if ($item["acquiring"] == "รับบริจาค") echo "checked" ?>> รับบริจาค
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
                  <div class="col-6">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-raised">
                        <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" align="center" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                      <div>
                        <span class="btn btn-raised btn-round btn-default btn-file">
                          <br>
                          <div class="col-2 offset-1">
                            <input type="file" name="image" />
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="row">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn btn-block " data-toggle="modal" data-target="#exampleModal">
                      บันทึก
                      <div class="ripple-container"></div>
                    </button>
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
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- สิ้นสุดการเขียนตรงนี้ -->
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
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger">
                      <i class="fas fa-file-invoice-dollar"></i> แก้ไขข้อมูลการจัดซื้อ(ครุภัณฑ์)</h6>
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
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
                          <tr class="text-center">
                            <th>#</th>
                            <th>เลขที่ใบสั่งซื้อ</th>
                            <th>วันที่จัดซื้อ</th>
                            <th>ชื่อผู้จัดซื้อ</th>
                            <th>รหัสครุภัณฑ์</th>
                            <th>จำนวน</th>
                            <th>การทำงาน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sqlSelect = "SELECT * FROM durable_articles_purchase";
                          $sqlSelect .= " WHERE status = 1";
                          if (isset($_GET["keyword"])) {
                            $keyword = $_GET["keyword"];
                            $sqlSelect .= " and (product_id like '%$keyword%' or purchase_date like '%$keyword%')";
                          }
                          // echo $sqlSelect;
                          $result = mysqli_query($conn, $sqlSelect);
                          while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            ?> <tr class="text-center">
                              <td><?php echo thainumDigit($row["id"]); ?></td>
                              <td><?php echo thainumDigit($row["order_no"]); ?></td>
                              <td><?php echo thainumDigit($row["purchase_date"]); ?></td>
                              <td><?php echo thainumDigit($row["product_id"]); ?></td>
                              <td><?php echo thainumDigit($row["order_by"]); ?></td>
                              <td><?php echo thainumDigit($row["number"]); ?></td>
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
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <script>
          function search() {
            var kw = $("#keyword").val();
            $.ajax({
              url: 'service/service_search_json_durable_articles.php',
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
        </script>
</body>

</html>