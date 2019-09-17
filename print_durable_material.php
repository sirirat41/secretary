<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT a.*, t.name as durable_material_type_name ,un.name as unit_name, se.name as seller_name, se.tel as seller_tel, se.fax as seller_fax, se.address as seller_address ,d.shortname ,d.fullname, d.bulding, d.floor , pu.purchase_date FROM durable_material as a ,durable_material_type as t , seller as se , department as d , unit as un , durable_material_purchase as pu WHERE a.id = $id and pu.id = $id";
  $sql .= " and a.type = t.id and a.seller_id = se.id and a.department_id = d.id and a.unit = un.id and pu.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
//ราคา
$total =  $row["price"];
//อายุการใช้งาน
$lifetime = $row["durable_year"];
//ดึงวันที่
$purchase = new DateTime($row["purchase_date"]);
//หาวัน เดือน ปี และ แต่ละเดือนมีกี่วัน
$day =  $purchase->format('d');
$month =  $purchase->format('m');
$year = $purchase->format('Y');
$dateMouth = $purchase->format('t');

// //ค่าเสื่อมประจำปีเต็ม
// $depPerYearM = $total * $rate / 100;
// echo $depPerYearM . "<br>";

// เดือนลบวัน 
$monthDay = ($dateMouth - $day) + 1;
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
  <secretary style="display : none">print_durable_material</secretary>
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


    <!-- End of Topbar -->


    <!-- Begin Page Content -->

    <body onLoad="window.print()">
      <div class="container-fluid">
      </div>
    </body>
  </div>

  <body style="padding: 16px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12" align="center">
          <h7>วัสดุคงทน</h7>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <label class="text" for="type">
            <h7>ประเภทวัสดุ :</h7>
          </label>
          <?php echo $row["durable_material_type_name"]; ?>
        </div>
        <div class="text" class="col-sm-">
          <h7>ส่วนราชการ: </h7>
        </div>
        <div class="col-sm-3">
          <h7>สำนักงานตำนวจแห่งชาติ</h7>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <label class="text" for="attribute">
            <h7>ลักษณะ/คุณสมบัติ:</h7>
          </label>
          <?php echo thainumDigit($row["attribute"]); ?>
        </div>
        <div class="col-sm-">
          <label class="text" for="short_goverment">
            <div style="width:80px">
              <h7>หน่วยงาน: </h7>
          </label>
        </div>
      </div>
      <div class="col-sm-3">
        <?php echo $row["short_goverment"]; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text" for="code">
          <h7>รหัส :</h7>
        </label>
        <?php echo $row["code"]; ?>
      </div>
      <div class="col-sm-6">
        <label class="text" for="bill_no">
          <h7>เลขที่ใบเบิก :</h7>
        </label>
        <?php echo thainumDigit($row["bill_no"]); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text" for="asset_no">
          <h7>เลขสินทรัพย์ :</h7>
        </label>
        <?php echo thainumDigit($row["asset_no"]); ?>
      </div>
      <div class="col-sm-6">
        <label class="text" for="fullname">
          <h7>สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ :</h7>
        </label>
        <?php echo $row["fullname"]; ?>
        <label class="text" for="bulding">อาคาร
        </label>
        <?php echo thainumDigit($row["bulding"]); ?>/
        <label class="text" for="floor">ชั้น
        </label>
        <?php echo thainumDigit($row["floor"]); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text" for="name">
          <h7>รายการวัสดุ :</h7>
        </label>
        <?php echo $row["name"]; ?>
      </div>
      <div class="col-sm-6">
        <label class="text" for="seller_address">
          <h7>ที่อยู่ :</h7>
        </label>
        <?php echo thainumDigit($row["seller_address"]); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text" for="seller_id">
          <h7>ชื่อผู้ขาย :</h7>
        </label>
        <?php echo $row["seller_name"]; ?>
      </div>
      <div class="col-sm-6">
        <label class="text" for="seller_tel">
          <h7>โทรศัพท์/FAX :</h7>
        </label>
        <?php echo thainumDigit($row["seller_tel"]); ?>/
        <label class="text" for="seller_fax">
        </label>
        <?php echo thainumDigit($row["seller_fax"]); ?>
      </div>
    </div>
    <style type="text/css" media="print">
      @page {
        size: landscape;
      }
    </style>
    <br>
    <form>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class='border-color-gray' align="left" cellpadding="5" cellspacing="5" border="1" width="100%">
              <thead>
                <tr class="text-center">
                  <th>วัน/เดือน/ปี</th>
                  <th>เลขที่เอกสาร</th>
                  <th>รายการ</th>
                  <th>จำนวนหน่วย</th>
                  <th>ราคาต่อหน่วย/ชุด/กลุ่ม</th>
                  <th>มูลค่ารวม</th>
                  <th>อายุการใช้งาน</th>
                  <th>อัตราค่าเสื่อมราคา</th>
                  <th>ค่าเสื่อมราคาประจำปี</th>
                  <th>ค่าเสื่อมราคาสะสม</th>
                  <th>มูลค่าสุทธิ</th>
                  <th>หมายเหตุ</th>
                </tr class="text-center">
              </thead>

          </div>
          <thead>
            <tr class="text-center">
              <td><?php $dayY =  $purchase->format('d m Y');
                  echo thainumDigit($dayY);
                  ?>
              </td>
              <td></td>
              <td> <?php echo thainumDigit($row["attribute"] . "<br>"); ?>** <?php echo thainumDigit($row["name"]); ?>**</td>
              <td>๑</td>
              <td><?php echo thainumDigit(number_format(($row["price"]), 2, '.', '')); ?></td>
            <td><?php echo thainumDigit(number_format(($row["price"]), 2, '.', '')); ?></td>
                <td><?php echo thainumDigit($row["durable_year"]); ?></td>
                <td><?php $rate = 100 / $row["durable_year"];
                    echo thainumDigit(number_format($rate, 2, '.', '')); ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="td-actions text-center">
            </tr>

            <?php
            $deptotal = 0;
            $firstDep = 0;
            $totalAll = 0;
            for ($i = 0; $i < $lifetime + 1; $i++) {

              ?>
              <tr class="text-center" >
                <td width="10%">
                  <?php if ($i == ($lifetime)) {
                        echo thainumDigit($purchase->format('d'));
                      } else {
                        echo thainumDigit($dateMouth);
                      }
                      echo thainumDigit(" " . $month . " ");
                      if ($i >= 1) {
                        echo thainumDigit($year + $i);
                      } else {
                        echo thainumDigit($year);
                      }
                      ?>
                </td>
                <td></td>
                <td>คิดค่าเสื่อม</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <?php
                    if ($i == 0) {
                      $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                      $firstDep = number_format($depPerYear, 2, '.', '');
                      $deptotal += number_format($depPerYear, 2, '.', '');
                      echo thainumDigit(number_format($depPerYear, 2, '.', ''));
                    } else if ($i == $lifetime) {
                      //$NETT = ($netvalue  + $Yearcumu) - 1;
                      //$deptotal += number_format($NETT, 2, '.', '');
                      // echo number_format($NETT, 2, '.', '') . "<br>";
                      $depPerYearM = $total * $rate / 100;
                      $lastMoney = $depPerYearM - $firstDep;
                      $deptotal += number_format($lastMoney, 2, '.', '') - 1;
                      echo thainumDigit(number_format($lastMoney, 2, '.', ''));
                    } else {
                      $depPerYearM = $total * $rate / 100;
                      $deptotal += number_format($depPerYearM, 2, '.', '');
                      echo thainumDigit(number_format($depPerYearM, 2, '.', ''));
                    }


                    ?>
                </td>
                <td>
                  <?php
                    // if ($i == 0) {
                    //   $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                    //   echo number_format($depPerYear, 2, '.', '');
                    // } else if ($i == $lifetime) {
                    //   $Yearcumu = $depPerYearM  + $depPerYear;
                    //   echo number_format($Yearcumu, 2, '.', '') . "<br>";
                    // } else {
                    //   $depPerYear = ($total * $rate / 100) * ($monthDay / 365);
                    //   echo number_format($depPerYear, 2, '.', '') . "<br>";
                    // }
                    echo thainumDigit(number_format($deptotal, 2, '.', ''));

                    ?>
                </td>

                <td>
                  <?php
                    $totalAll = $total - $deptotal;
                    echo thainumDigit(number_format($totalAll, 2, '.', ''));
                    ?>
                </td>
                <td></td>
              </tr>
            <?php
            }
            ?>
          </thead>
          </table>
        </div>
      </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</body>

</html>