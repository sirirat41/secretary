<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT a.*, t.name ,s.code ,s.supplies_id ,ss.stock ,ss.type, ss.supplies_name, ss.attribute ,u.name as unit_name ,d.fullname ,d.bulding ,d.floor FROM supplies as s ,supplies_stock as ss, supplies_account as a, durable_material_type as t,unit as u,department as d WHERE a.id = $id";
  $sql .= " and a.product_id = s.id and a.supplies_id = ss.id and ss.type = t.id and a.status = 1 ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $a = 1;
}
?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display : none">print_supplies</secretary>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">

</head>

<style type="text/css" media="print">
  @page {
    size: landscape;
  }

  @media all {
    .page-break {
      display: none;
    }

    .page-break-no {
      display: none;
    }
  }

  @media print {
    .page-break {
      display: block;
      height: 1px;
      page-break-before: always;
    }

    .page-break-no {
      display: block;
      height: 1px;
      page-break-after: avoid;
    }
  }
</style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- End of Topbar -->


    <!-- Begin Page Content -->

    <body onLoad="window.print()">
      <div class="container-fluid">
      </div>
  </div>
  <br>
  <form>
    <div class="row">
      <div class="col-12">
        <?php for ($a = 1; $a <= 2; $a++) { ?>
          <div class="page-break<?= ($a == 1) ? "-no" : "" ?>"></div>
          <div class="table-responsive">
            <table class='border-color-gray' align="center" cellpadding="10" cellspacing="10" border="1" width="100%">
              <thead>
                <body style="padding: 16px">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-sm-12" align="center">
                        <h7>บัญชีคุม ประจำปี งบประมาณ .....</h7>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-7">
                      </div>
                      <div class="text " class="col-sm-">
                        <h7>ส่วนราชการ: </h7>
                      </div>
                      <div class="col-sm-3">
                        <h7>สำนักงานตำรวจแห่งชาติ</h7>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-7">
                      </div>
                      <div class="col-sm-">
                        <label class="text " for="short_goverment">
                          <div style="width:80px">
                            <h7>หน่วยงาน: </h7>
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <h7>สลก.ตร.</h7>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label class="text ">
                        <h7>แผ่นที่</h7>
                      </label>
                      <?php echo $a++; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label class="text " for="type">
                        <h7>ประเภท :</h7>
                      </label>
                      <?php echo $row["name"]; ?>
                    </div>
                    <div class="col-sm-4">
                      <label class="text " for="supplies_name">
                        <h7>ชื่อหรือชนิดวัสดุ :</h7>
                      </label>
                      <?php echo ($row["supplies_name"]); ?>
                    </div>
                    <div class="col-sm-4">
                      <label class="text " for="code">
                        <h7>รหัส :</h7>
                      </label>
                      <?php echo ($row["code"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label class="text " for="attribute">
                        <h7>ขนาดหรือลักษณะ :</h7>
                      </label>
                      <?php echo ($row["attribute"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label class="text " for="unit">
                        <h7>หน่วยที่นับ : </h7>
                      </label>
                      <?php echo ($row["unit_name"]); ?>
                    </div>
                    <div class="col-sm-6">
                      <label class="text " for="fullname">
                        <h7>ที่เก็บ :</h7>
                      </label>
                      <?php echo ($row["fullname"]); ?>
                      <label class="text " for="bulding">
                      </label>
                      <?php echo ($row["bulding"]); ?>
                      <label class="text " for="floor">
                      </label>
                      <?php echo ($row["floor"]); ?>
                    </div>
                  </div>

                  <tr class="text-center ">

                    <td rowspan="2">วัน/เดือน/ปี</td>
                    <td rowspan="2">รับจาก</td>
                    <td rowspan="2">จ่ายให้</td>
                    <td rowspan="2">เลขที่เอกสาร</td>
                    <td colspan="2" width="15%" height="10">ราคาต่อหน่วย</td>
                    <td rowspan="2">หน่วยนับ</td>
                    <td colspan="3">จำนวน</td>
                    <td rowspan="2">หมายเหตุ</td>
                  </tr class="text-center">
                  <tr class="text-center">
                    <td width="10%">บาท </td>
                    <td>สต.</td>
                    <td width="7%">รับ</td>
                    <td width="7%">จ่าย</td>
                    <td width="7%">คงเหลือ</td>
                  </tr class="text-center">
              </thead>

              <tbody>

                <tr class="text-center " height="30">
                  <td rowspan="2"> <?php echo ($row["distribute_date"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["receive_from"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["distribute_to"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["document_no"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["baht"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["satang"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["unit"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["receive"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["distribute"]); ?></td>
                  <td rowspan="2"> <?php echo ($row["stock"]); ?></td>
                  <td rowspan="2"><?php echo ($row["flag"]); ?></td>
                </tr class="text-center">

              </tbody>
            <?php } ?>
            </table>


            <!-- <tr class="text-center">
                <td>วัน/เดือน/ปี</td>
                <td>รับจาก</td>
                <td>จ่ายให้</td>
                <td>เลขที่เอกสาร</td>
                <td colspan="4" width="50" height="50" > ราคาต่อหน่วย</td>
                <td>อายุการใช้งาน</td>
                <td>อัตราค่าเสื่อมราคา</td>
                <td>ค่าเสื่อมราคาประจำปี</td>
                <td>ค่าเสื่อมราคาสะสม</td>
                <td>มูลค่าสุทธิ</td>
                <td>หมายเหตุ</td>
              </tr class="text-center">
              <tr align="center">
                <td colspan="8">บาท</td>
                <td colspan="8">สต.</td>
                <td colspan="8">รับ</td>
                <td colspan="8">จ่าย</td>
                <td colspan="8">เหลือ</td>
              </tr> -->
          </div>
      </div>
    </div>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>