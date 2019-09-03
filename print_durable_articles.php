<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT m.*, t.name as durable_articles_type_name ,un.name as unit_name, se.name as seller_name, d.shortname ,d.fullname FROM durable_articles as m ,durable_articles_type as t , seller as se , department as d , unit as un WHERE m.id = $id";
  $sql .= " and m.type = t.id and m.seller_id = se.id and m.department_id = d.id and m.unit = un.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body style="padding: 16px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12" align="center">
        <h6>ทะเบียนคุมทรัพย์สิน</h6>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-4">
        <label for="type">
          <h6>ประเภท:</h6>
        </label>
        <?php echo $row["durable_articles_type_name"]; ?>
      </div>
      <div class="col-sm-4 offset-sm-4" align="left">
        <h6>ส่วนราชการ: สำนักงานตำนวจแห่งชาติ</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4"><label class="text-dark" for="attribute">
          <h6>ลักษณะ/คุณสมบัติ:</h6>
        </label>
        <?php echo $row["attribute"]; ?>
      </div>
      <div class="col-sm-4 offset-sm-4" align="left">
        <label for="shortname">
          <h6>หน่วยงาน: </h6>
        </label>
        <?php echo $row["shortname"]; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text-dark" for="model">
          <h6>รุ่นแบบ :</h6>
        </label>
        <?php echo $row["model"]; ?>

      </div>
      <div class="col-sm-6" align="right">
        <label class="text-dark" for="code">
          <h6>รหัส :</h6>
        </label>
        <?php echo $row["code"]; ?>

      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text-dark" for="bill_no">
          <h6>เลขที่ใบเบิก : </h6>
        </label>
        <?php echo $row["bill_no"]; ?>
      </div>
      <div class="col-sm-6" align="right">
        <label class="text-dark" for="asset_no">
          <h6>เลขสินทรัพย์ :</h6>
        </label>
        <?php echo $row["asset_no"]; ?>

      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="text-dark" for="budget">
          <h6>งบประมาณ : </h6>
        </label>
        <?php echo $row["budget"]; ?>
      </div>
      <div class="col-sm-6" align="right">
        <label class="text-dark" for="d_gen">
          <h6>เอกสารสำรองเงิน : </h6>
        </label>
        <?php echo $row["d_gen"]; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h6>เลขที่หนังสือ : </h6>
      </div>
      <div class="col-sm-6" align="right">
        <h6>ชื่อผู้ขาย : </h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h6>หน่วยงานที่รับผิดชอบ : </h6>
      </div>
      <div class="col-sm-6" align="right">
        <h6>ที่อยู่ : </h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h6>สถานที่ตั้ง : </h6>
      </div>
      <div class="col-sm-6" align="right">
        <h6>โทรศัพท์/FAX : </h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h6>ประเภทเงิน : </h6>
      </div>
      <div class="col-sm-6" align="right">
        <h6>วิธีการได้มา : </h6>
      </div>
    </div>
  </div>
  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
  </style>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>