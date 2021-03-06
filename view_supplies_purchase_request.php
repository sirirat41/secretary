<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM supplies_request as a , supplies_purchase_request as p, supplies_stock as s WHERE a.id = $id and p.product_id = a.id and a.supplies_id = s.id";
    $result = mysqli_query($conn, $sql) or die('cannot select data');
    $item = mysqli_fetch_assoc($result);
    $receiveDate = $item["receive_date"];
    $orderDate = $item["purchase_date"];
    $newReceiveDate = date("Y-m-d", strtotime($receiveDate));
    $newOrderDate = date("Y-m-d", strtotime($orderDate));
    $supID = $item["code"];

    $sqlUser = "SELECT * FROM user WHERE id = " . $item["user_request"];
    $resultUser = mysqli_query($conn, $sqlUser);
    $userRequest = mysqli_fetch_assoc($resultUser);

    $sqlOld = "SELECT * FROM supplies as a , supplies_purchase as p, supplies_stock as s WHERE a.code = '$supID' and p.product_id = a.id and a.supplies_id = s.id";
    $resultOld = mysqli_query($conn, $sqlOld) or die('cannot select data');
    $itemOld = mysqli_fetch_assoc($resultOld);
    $receiveDateOld = $itemOld["receive_date"];
    $orderDateOld = $itemOld["purchase_date"];
    $oldReceiveDate = date("Y-m-d", strtotime($receiveDateOld));
    $oldOrderDate = date("Y-m-d", strtotime($orderDateOld));

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


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/secretary.css" rel="stylesheet">

    <style>
        .alert-class {
            border-color: red;
        }
    </style>

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
                <div class="col-12">
                    <label class="body-text" for="exampleFormControlSelect1">ร้องขอการ<?php echo $item["action_request"] == "request_update" ? "แก้ไข" : "ยกเลิก"; ?>โดย คุณ <?php echo $userRequest["surname"] . " " . $userRequest["lastname"]; ?></label>
                    <textarea class="form-control" disabled name="reason" id="request" cols="30" rows="5" style="resize: none"><?php echo $item["reason"]; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <?php if ($item["action_request"] == "request_update") { ?>
                    <div class="col-6" <?php echo $item["status_request"] != "waiting_approve" ? "style='display: none'" : ""; ?>>
                        <div class="card">
                            <div class="card-header card-header-text card-header-danger">
                                <div class="card-text">
                                    <h5 class="m-0 font-weight-bold text-danger">
                                        <i class="fas fa-fw fa-archive"></i>
                                        ข้อมูลเดิม
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="card-body">
                                <form method="post" action="" id="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                                                <input class="form-control" type="text" disabled placeholder="order_no" name="order_no" value="<?php echo $itemOld["order_no"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                                                <input class="form-control" type="date" disabled placeholder="purchase_date" name="purchase_date" value="<?php echo $oldOrderDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                                                <input class="form-control" type="text" disabled placeholder="order_by" name="order_by" value="<?php echo $itemOld["order_by"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="receiver">ชื่อผู้รับ :</label>
                                                <input type="text" class="form-control" disabled name="receiver" id="receiver" placeholder="receiver" id="receiver" value="<?php echo $itemOld["receiver"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="receive_date">วันที่ตรวจรับ :</label>
                                                <input type="date" class="form-control" disabled name="receive_date" id="receive_date" placeholder="receive_date" id="receive_date" value="<?php echo $oldReceiveDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="receive_address">สถานที่จัดส่ง :</label>
                                                <textarea class="form-control" disabled name="receive_address" id="receive_address" rows="3" placeholder="address" id="address"><?php echo $itemOld["receive_address"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group bmd-form-group body-text">
                                                <label class="bmd-label-floating">หน่วยงาน :</label>
                                                <input class="form-control" type="text" disabled placeholder="short_goverment" name="short_goverment" id="short_goverment" value="<?php echo $itemOld["short_goverment"]; ?>">
                                                <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="bill_no">เลขที่ใบเบิก :</label>
                                                <input type="text" class="form-control" disabled name="bill_no" id="inputbill_no" aria-describedby="bill_no" placeholder="bill_no" value="<?php echo $itemOld["bill_no"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group body-text">
                                                <label for="exampleFormControlSelect1">หน่วยงาน :</label>
                                                <select class="form-control" data-style="btn btn-link" disabled id="exampleFormControlSelect1" name="department_id" value="<?php echo $itemOld["department_id"]; ?>">
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
                                                <label for="price">จำนวนเงิน :</label>
                                                <input type="text" class="form-control" disabled name="price" id="inputprice" aria-describedby="price" placeholder="price" value="<?php echo $itemOld["price"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group body-text">
                                                <label for="price">จำนวนคงเหลือ :</label>
                                                <input type="text" class="form-control" disabled name="number" id="" aria-describedby="price" placeholder="stock" value="<?php echo $itemOld["stock"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="product_id">รหัสวัสดุสินเปลือง :</label>
                                                <input class="form-control" name="product_id" type="text" placeholder="product_id" id="product_id" value="<?php echo $itemOld["code"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="unit">หน่วยนับ</label>
                                                <select class="form-control" disabled name="unit" value="<?php echo $itemOld["unit"]; ?>">
                                                    <?php
                                                    $sqlSelectType = "SELECT * FROM unit";
                                                    $resultType = mysqli_query($conn, $sqlSelectType);
                                                    while ($row = mysqli_fetch_assoc($resultType)) {
                                                        if ($itemOld["unit"] == $row["id"]) {
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
                                                <label for="exampleFormControlSelect1">ชื่อผู้ขาย :</label>
                                                <select class="form-control" disabled data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id" value="<?php echo $itemOld["seller_id"]; ?>">
                                                    <?php
                                                    $sqlSelectType = "SELECT * FROM seller";
                                                    $resultType = mysqli_query($conn, $sqlSelectType);
                                                    while ($row = mysqli_fetch_assoc($resultType)) {
                                                        if ($itemOld["seller_id"] == $row["id"]) {
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
                                                    <img class="img-thumbnail" src="uploads/<?php echo $itemOld["picture"]; ?>" align="center" alt="...">
                                                    <input type="hidden" name="old_image" value="<?php echo $itemOld["picture"]; ?>">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                        <!-- สิ้นสุดการเขียนตรงนี้ -->
                    </div>
                    <div <?php echo $item["status_request"] != "waiting_approve" ? "class='col-8 offset-2'" : "class='col-6'"; ?>>
                        <div class="card">
                            <div class="card-header card-header-text card-header-danger">
                                <div class="card-text">

                                    <h5 class="m-0 font-weight-bold text-danger">
                                        <i class="fas fa-fw fa-archive"></i>
                                        ข้อมูลที่ร้องขอการแก้ไข
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="card-body">
                                <form method="post" action="service/service_confirm_supplies_purchase_request.php?id=<?php echo $id; ?>" id="form_insert" enctype="multipart/form-data">
                                    <input type="hidden" name="action_request" value="<?php echo $item["action_request"]; ?>">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                                                <input class="form-control <?php echo $itemOld["order_no"] != $item["order_no"] ? "alert-class" : ""; ?>" type="text" placeholder="order_no" name="order_no" value="<?php echo $item["order_no"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                                                <input class="form-control <?php echo $newOrderDate != $oldOrderDate ? "alert-class" : ""; ?>" type="date" placeholder="purchase_date" name="purchase_date" value="<?php echo $newOrderDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                                                <input class="form-control <?php echo $itemOld["order_by"] != $item["order_by"] ? "alert-class" : ""; ?>" type="text" placeholder="order_by" name="order_by" value="<?php echo $item["order_by"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="receiver">ชื่อผู้รับ :</label>
                                                <input type="text" class="form-control <?php echo $itemOld["receiver"] != $item["receiver"] ? "alert-class" : ""; ?>" name="receiver" id="receiver" placeholder="receiver" id="receiver" value="<?php echo $item["receiver"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="receive_date">วันที่ตรวจรับ :</label>
                                                <input type="date" class="form-control <?php echo $newReceiveDate != $oldReceiveDate ? "alert-class" : ""; ?>" name="receive_date" id="receive_date" placeholder="receive_date" id="receive_date" value="<?php echo $newReceiveDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="receive_address">สถานที่จัดส่ง :</label>
                                                <textarea class="form-control <?php echo $itemOld["receive_address"] != $item["receive_address"] ? "alert-class" : ""; ?>" name="receive_address" id="receive_address" rows="3" placeholder="address" id="address"><?php echo $item["receive_address"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group bmd-form-group body-text">
                                                <label class="bmd-label-floating">หน่วยงาน :</label>
                                                <input class="form-control <?php echo $itemOld["short_goverment"] != $item["short_goverment"] ? "alert-class" : ""; ?>" type="text" placeholder="short_goverment" name="short_goverment" id="short_goverment" value="<?php echo $item["short_goverment"]; ?>">
                                                <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="bill_no">เลขที่ใบเบิก :</label>
                                                <input type="text" class="form-control <?php echo $itemOld["bill_no"] != $item["bill_no"] ? "alert-class" : ""; ?>" name="bill_no" id="inputbill_no" aria-describedby="bill_no" placeholder="bill_no" value="<?php echo $item["bill_no"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group body-text">
                                                <label for="exampleFormControlSelect1">หน่วยงาน :</label>
                                                <select class="form-control <?php echo $itemOld["department_id"] != $item["department_id"] ? "alert-class" : ""; ?>" data-style="btn btn-link" id="exampleFormControlSelect1" name="department_id" value="<?php echo $item["department_id"]; ?>">
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
                                                <label for="price">จำนวนเงิน :</label>
                                                <input type="text" class="form-control <?php echo $itemOld["price"] != $item["price"] ? "alert-class" : ""; ?>" name="price" id="inputprice" aria-describedby="price" placeholder="price" value="<?php echo $item["price"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group body-text">
                                                <label for="price">จำนวนคงเหลือ :</label>
                                                <input type="text" class="form-control <?php echo $itemOld["stock"] != $item["number"] ? "alert-class" : ""; ?>" name="number" id="" aria-describedby="price" placeholder="stock" value="<?php echo $item["number"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="product_id">รหัสวัสดุสิ้นเปลือง :</label>
                                                <input class="form-control <?php echo $itemOld["code"] != $item["code"] ? "alert-class" : ""; ?>" name="product_id" type="text" placeholder="product_id" id="product_id" value="<?php echo $item["code"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="unit">หน่วยนับ :</label>
                                                <select class="form-control <?php echo $itemOld["unit"] != $item["unit"] ? "alert-class" : ""; ?>" name="unit" value="<?php echo $item["unit"]; ?>">
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
                                                <label for="exampleFormControlSelect1">ชื่อผู้ขาย :</label>
                                                <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id" value="<?php echo $item["seller_id"]; ?>">
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
                                                    <img class="img-thumbnail" src="uploads/<?php echo $item["picture"] != "" ? $item["picture"] : $itemOld["picture"] ; ?>" align="center" alt="...">
                                                    <input type="hidden" name="old_image" value="<?php echo $item["picture"] != "" ? $item["picture"] : $itemOld["picture"] ; ?>">
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
                                    <br>
                                    <?php
                                    if ($item["status_request"] == "rejected") {
                                    ?>
                                        <div class="row">
                                            <label class="body-text" for="exampleFormControlSelect1">เหตุผลในการปฎิเสธ : </label>
                                            <div class="col-12">
                                                <textarea class="form-control" rows="10" disabled><?php echo $item["reject"]; ?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                    <?php }; ?>
                                    <br>
                                </form>
                            </div>
                        </div>
                        <!-- สิ้นสุดการเขียนตรงนี้ -->
                    </div>
                <?php } else { ?>
                    <div class="col-8 offset-2" <?php echo $item["action_request"] != "request_delete" ? "style='display: none'" : ""; ?>>
                        <div class="card">
                            <div class="card-header card-header-text card-header-danger">
                                <div class="card-text">
                                    <h5 class="m-0 font-weight-bold text-danger">
                                        <i class="fas fa-fw fa-archive"></i>
                                        ข้อมูลที่ต้องการยกเลิก
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="card-body">
                                <form method="post" action="service/service_confirm_supplies_purchase_request.php?id=<?php echo $id; ?>" id="form_insert" enctype="multipart/form-data">
                                    <input type="hidden" name="action_request" value="<?php echo $item["action_request"]; ?>">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">เลขที่ใบสั่งซื้อ :</label>
                                                <input class="form-control" type="text" placeholder="order_no" name="order_no" value="<?php echo $itemOld["order_no"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">วันที่จัดซื้อ :</label>
                                                <input class="form-control" type="date" placeholder="purchase_date" name="purchase_date" value="<?php echo $oldOrderDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group body-text">
                                                <label class="bmd-label-floating">ชื่อผู้จัดซื้อ :</label>
                                                <input class="form-control" type="text" placeholder="order_by" name="order_by" value="<?php echo $itemOld["order_by"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="receiver">ชื่อผู้รับ :</label>
                                                <input type="text" class="form-control" name="receiver" id="receiver" placeholder="receiver" id="receiver" value="<?php echo $itemOld["receiver"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="receive_date">วันที่ตรวจรับ :</label>
                                                <input type="date" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date" id="receive_date" value="<?php echo $oldReceiveDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="receive_address">สถานที่จัดส่ง :</label>
                                                <textarea class="form-control" name="receive_address" id="receive_address" rows="3" placeholder="address" id="address"><?php echo $itemOld["receive_address"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group bmd-form-group body-text">
                                                <label class="bmd-label-floating">หน่วยงาน :</label>
                                                <input class="form-control" type="text" placeholder="short_goverment" name="short_goverment" id="short_goverment" value="<?php echo $itemOld["short_goverment"]; ?>">
                                                <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group body-text">
                                                <label for="bill_no">เลขที่ใบเบิก :</label>
                                                <input type="text" class="form-control" name="bill_no" id="inputbill_no" aria-describedby="bill_no" placeholder="bill_no" value="<?php echo $item["bill_no"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group body-text">
                                                <label for="exampleFormControlSelect1">หน่วยงาน :</label>
                                                <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="department_id" value="<?php echo $item["department_id"]; ?>">
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
                                                <label for="price">จำนวนเงิน :</label>
                                                <input type="text" class="form-control" name="price" id="inputprice" aria-describedby="price" placeholder="price" value="<?php echo $item["price"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group body-text">
                                                <label for="price">จำนวนคงเหลือ :</label>
                                                <input type="text" class="form-control" name="number" id="" aria-describedby="price" placeholder="stock" value="<?php echo $item["number"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group body-text">
                                                <label for="product_id">รหัสวัสดุสิ้นเปลือง :</label>
                                                <input class="form-control" name="product_id" type="text" placeholder="product_id" id="product_id" value="<?php echo $item["code"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <div class="form-group body-text">
                                                <label for="unit">หน่วยนับ :</label>
                                                <select class="form-control <?php echo $itemOld["unit"] != $item["unit"] ? "alert-class" : ""; ?>" name="unit" value="<?php echo $item["unit"]; ?>">
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
                                                <label for="exampleFormControlSelect1">ชื่อผู้ขาย :</label>
                                                <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id" value="<?php echo $item["seller_id"]; ?>">
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
                                                    <img class="img-thumbnail" src="uploads/<?php echo $item["picture"]; ?>" align="center" alt="...">
                                                    <input type="hidden" name="old_image" value="<?php echo $item["picture"]; ?>">
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
                                    <br>
                                    <?php
                                    if ($item["status_request"] == "rejected") {
                                    ?>
                                        <div class="row">
                                            <label class="body-text" for="exampleFormControlSelect1">เหตุผลในการปฎิเสธ : </label>
                                            <div class="col-12">
                                                <textarea class="form-control" rows="10" disabled><?php echo $item["reject"]; ?></textarea>
                                            </div>
                                        </div>
                                        <br>
                                    <?php }; ?>
                                    <br>
                                </form>
                            </div>
                        </div>
                        <!-- สิ้นสุดการเขียนตรงนี้ -->
                    </div>
                <?php } ?>
                <!-- /.container-fluid -->
            </div>
            <br>
            <?php
            if ($_SESSION["user_type"] == 1 && $item["status_request"] == "waiting_approve") {
            ?>
                <div class="row">
                    <div class="col-3 offset-2">
                        <button style="width: 100%" type="button" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger body-text">ไม่อนุมัติ</button>
                    </div>
                    <div class="col-5">
                        <button style="width: 100%" data-toggle="modal" data-target="#modal-approve" type="button" class="btn btn-primary body-text">อนุมัติ</button>
                    </div>
                </div>
                <br>
            <?php }; ?>
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
    <div class="modal fade" id="modal-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">ยืนยันการอนุมัติ</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body body-text">ระบบจะทำการ<?php echo $item["action_request"] == "request_update" ? "แก้ไข" : "ยกเลิก"; ?>ข้อมูลทันที ไม่สามารถกลับไปแก้ไขเพิ่มเติมได้อีก</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary body-text" type="button" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary body-text" type="button" data-dismiss="modal" onclick="$('#form_insert').submit()">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">ยืนยันการปฎิเสธ</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body body-text">* กรุณาระบุเหตุผลในการปฎิเสธ: </div>
                <div class="col-12">
                    <div>
                        <textarea class="form-control" id="reject-reason" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary body-text" type="button" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-danger body-text" type="button" data-dismiss="modal" onclick="rejectRequest();">ยืนยัน</button>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
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
                                        <h5 class="m-0 font-weight-bold text-danger ">
                                            <i class="fas fa-file-invoice-dollar"></i> แก้ไขข้อมูลการจัดซื้อ(ครุภัณฑ์)</h5>
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
                                                    <tr class="text-center body-text">
                                                        <th>#</th>
                                                        <th>เลขที่ใบสั่งซื้อ</th>
                                                        <th>วันที่จัดซื้อ</th>
                                                        <th>ชื่อผู้จัดซื้อ</th>
                                                        <th>รหัสครุภัณฑ์</th>
                                                        <th>จำนวน</th>
                                                        <th>การทำงาน</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="modal-articles-body">
                                                    <!-- ///ดึงข้อมูล -->
                                                    <?php
                                                    $sqlSelect = "SELECT s.*, t.name FROM supplies as s, durable_material_type as t";
                                                    $sqlSelect .= " WHERE s.type = t.id and s.status = 1";
                                                    if (isset($_GET["keyword"])) {
                                                        $keyword = $_GET["keyword"];
                                                        $sqlSelect .= " and (s.code like '%$keyword%' or s.type like '%$keyword%' or t.name like '%$keyword%')";
                                                    }
                                                    //echo $sqlSelect;
                                                    $result = mysqli_query($conn, $sqlSelect);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row["id"]
                                                    ?>
                                                        <tr class="text-center body-text">
                                                            <td><?php echo ($row["id"]); ?></td>
                                                            <td><?php echo ($row["seq"]); ?></td>
                                                            <td><?php echo ($row["bill_no"]); ?></td>
                                                            <td><?php echo ($row["code"]); ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["type"]; ?></td>
                                                            <td class="td-actions text-center">
                                                                <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedSupplies(<?php echo $row["id"]; ?>);">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
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

                    function rejectRequest() {
                        var url = "service/service_reject_request.php?id=<?php echo $id; ?>";
                        var reason = $('#reject-reason').val();
                        if (reason != "") {
                            $.ajax({
                                url: url,
                                dataType: 'JSON',
                                type: 'POST',
                                data: {
                                    reason: reason
                                },
                                success: function(data) {
                                    window.location = "display_supplies_request.php";
                                }
                            })
                        } else {
                            alert('กรุณาระบเหตุผล');
                        }
                    }
                </script>
</body>


</html>