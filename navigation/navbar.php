<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_id'])) {
  ?>
  <?php
    if ($_SESSION['user_type'] == '1') {
      ?>
    <ul class="navbar-nav my-primary-color sidebar sidebar-dark accordion" id="accordionSidebar">
      <br>
      <br>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon ">
          <img src="./img/logo1.png" class="my-logo">
        </div>
      </a>
      <br>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item nav-home">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-home"></i>
          <span class="body-text-menu">หน้าหลัก</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Durable Articles Collapse Menu -->
      <li class="nav-item nav-articles">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseArticles">
          <i class="fas fa-fw fa-cubes"></i>
          <span class="body-text-menu">ทะเบียนคุม</span>
        </a>
        <div id="collapseArticles" class="collapse collapse-articles " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
          <a class="collapse-item display" href="display_durable_articles.php">แสดงข้อมูล</a>
            <a class="collapse-item purchase" href="display_durable_articles_purchase.php">จัดซื้อ</a>
            <a class="collapse-item permits" href="display_durable_articles_permits.php">ยืม-คืน</a>
            <a class="collapse-item damage" href="display_durable_articles_damage.php">รายการชำรุด</a>
            <a class="collapse-item repair" href="display_durable_articles_repair.php">รายการซ่อม</a>
<br>
<a class="collapse-item">แทงจำหน่าย</a>
            <a class="collapse-item sell" href="display_durable_articles_sell.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;ขายทอดตลาด</a>
            <a class="collapse-item transfer" href="display_durable_articles_transfer_in.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;โอนเข้า</a>
            <a class="collapse-item transferO" href="display_durable_articles_transfer_out.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;โอนออก</a>
            <a class="collapse-item donate" href="display_durable_articles_receive_donate.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;บริจาคเข้า</a>
            <a class="collapse-item donateO" href="display_durable_articles_donate.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;บริจาคออก</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Durable Material Collapse Menu -->
      <li class="nav-item nav-material">
      <a class="nav-link collapsed" href="#"  data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
          <i class="fas fa-fw fa-box"></i>
          <span class="body-text-menu">วัสดุ</span>
        </a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaterial" aria-expanded="true" aria-controls="collapseMaterial">
          
          <span class="body-text-menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัสดุคงทน</span>
        </a>
        <div id="collapseMaterial" class="collapse collapse-material" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
            <a class="collapse-item display" href="display_durable_material.php">แสดงข้อมูล</a>
            <a class="collapse-item purchase" href="display_durable_material_purchase.php">จัดซื้อ</a>
            <a class="collapse-item permits" href="display_durable_material_permits.php">ยืม-คืน</a>
            <a class="collapse-item damage" href="display_durable_material_damage.php">รายการชำรุด</a>
            <a class="collapse-item repair" href="display_durable_material_repair.php">รายการซ่อม</a>
<br>
<a class="collapse-item">แทงจำหน่าย</a>
            <a class="collapse-item sell" href="display_durable_material_sell.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;ขายทอดตลาด</a>
            <a class="collapse-item transfer" href="display_durable_material_transfer_in.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;โอนเข้า</a>
            <a class="collapse-item transferO" href="display_durable_material_transfer_out.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;โอนออก</a>
            <a class="collapse-item donates" href="display_durable_material_receive_donate.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;บริจาคเข้า</a>
            <a class="collapse-item donatesO" href="display_durable_material_donate.php">&nbsp;&nbsp;<i class="fa fa-caret-right"></i>&nbsp;บริจาคออก</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Supplies Collapse Menu -->
      <li class="nav-item nav-supplies">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplies" aria-expanded="true" aria-controls="collapseSupplies">
         
          <span class="body-text-menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัสดุสิ้นเปลือง</span>
        </a>
        <div id="collapseSupplies" class="collapse collapse-supplies" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
            <a class="collapse-item supplies" href="display_supplies.php">แสดงข้อมูล</a>
            <a class="collapse-item purchase" href="display_supplies_purchase.php">จัดซื้อ</a>
            <!-- <a class="collapse-item permits" href="display_supplies_permits.php">ยืม-คืน</a> -->
            <a class="collapse-item distribute" href="display_supplies_distribute_type.php">แจกจ่าย</a>
            <a class="collapse-item stock" href="display_supplies_stock.php">จำนวนคงเหลือ</a>
            <a class="collapse-item account" href="display_supplies_account.php">บัญชีคุมวัสดุ</a>


          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Department Collapse Menu -->
      <li class="nav-item nav-department">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
          <i class="fas fa-fw fa-city"></i>
          <span class="body-text-menu">หน่วยงาน</span>
        </a>
        <div id="collapseDepartment" class="collapse collapse-department" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item display body-text-menu" href="display_department.php">แสดงหน่วยงาน</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Users Collapse Menu -->
      <li class="nav-item nav-user">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <i class="fas fa-fw fa-users"></i>
          <span class="body-text-menu">จัดการข้อมูลผู้ใช้</span>
        </a>
        <div id="collapseUser" class="collapse collapse-user" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
            <a class="collapse-item displayu " href="display_user.php">แสดงรายชื่อ</a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-seller">
        <a class="nav-link" href="display_seller.php"  data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
        <i class="fas fa-fw fa-user"></i>
          <span class="body-text-menu">จัดการข้อมูลผู้ขาย</span>
        </a>

      <!-- Nav Item - Approve Collapse Menu -->
      <li class="nav-item nav-approve">
        <a class="nav-link collapsed displayse" href="#" data-toggle="collapse" data-target="#collapseApprove" aria-expanded="true" aria-controls="collapseApprove">
          <i class="fas fa-fw fa-folder"></i>
          <span class="body-text-menu">รายการรออนุมัติ</span>
        </a>
        <div id="collapseApprove" class="collapse collapse-approve" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
            <a class="collapse-item display-request" href="display_supplies_request.php">แสดงรายการรออนุมัติ</a>
          </div>
        </div>
      </li>

      <li class="nav-item nav-setting">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
          <i class="fas fa-fw fa-setting"></i>
          <span class="body-text-menu">ตั้งค่า</span>
        </a>
        <div id="collapseSetting" class="collapse collapse-setting" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded body-text-menu">
            <a class="collapse-item displayun" href="display_unit.php">หน่วยนับ</a>
            <a class="collapse-item displaya" href="display_durable_articles_type.php">ประเภทครุภัณฑ์</a>
            <a class="collapse-item displaym" href="display_durable_material_type.php">ประเภทวัสดุ</a>
            <a class="collapse-item auditor" href="edit_auditor.php?id=1">ผู้ตรวจสอบ </a>
            <a class="collapse-item display" href="คู่มือการใช้งาน.pdf">คู่มือการใช้งาน</a>

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="service/service_logout.php">
          <i class="fas fa-fw fa-"></i>
          <span class="body-text-menu">ออกจากระบบ</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <div class="col-md-4">
            <img src="./img/logosecretary.png" class="img-fluid">
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">
                  <?php
                      $sqlSelectApprove = "SELECT s.*, u.surname, u.lastname FROM supplies_request s, supplies_purchase_request p, user u";
                      $sqlSelectApprove .= " WHERE p.product_id = s.id and s.status_request = 'waiting_approve' and s.user_request = u.id";
                      $resultApprove = mysqli_query($conn, $sqlSelectApprove);
                      echo mysqli_num_rows($resultApprove) <= 0 ? "0" : mysqli_num_rows($resultApprove);
                      ?>
                </span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-danger" style="border: none">
                  แจ้งเตือน
                </h6>
                <?php
                    $count = 1;
                    while ($rowApproveNavbar = mysqli_fetch_assoc($resultApprove)) {
                      $colorRequest = "bg-primary";
                      $iconRequest = "fa-file-alt";
                      if ($rowApproveNavbar["action_request"] == "request_update") {
                        $iconRequest = "fa-file-alt";
                        $colorRequest = "bg-primary";
                      } else {
                        $iconRequest = "fa-exclamation-triangle";
                        $colorRequest = "bg-danger";
                      }
                      if ($count > 3) {
                        break;
                      }
                      ?>
                  <a class="dropdown-item d-flex align-items-center" href="view_supplies_purchase_request.php?id=<?php echo $rowApproveNavbar["id"]; ?>">
                    <div class="mr-3">
                      <div class="icon-circle <?php echo $colorRequest; ?>">
                        <i class="fas <?php echo $iconRequest; ?> text-white body-text-menu"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500"><?php echo $rowApproveNavbar["surname"] . " " . $rowApproveNavbar["lastname"]; ?></div>
                      <span class="font-weight-bold"><?php echo $rowApproveNavbar["reason"]; ?></span>
                    </div>
                  </a>
                <?php $count++;
                    } ?>
                <a class="dropdown-item text-center small text-gray-500 body-text-menu" href="display_supplies_request.php">แสดงแจ้งเตือนทั้งหมด</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["fullname"]; ?></span>
                <img class="img-profile rounded-circle" src="img/superadmin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="display_log.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400 body-text-menu"></i>
                  การเข้าใช้งาน
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="service/service_logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 body-text-menu"></i>
                  ออกจากระบบ
                </a>
              </div>
            </li>

          </ul>
        <?php } ?>


      <?php
      }
      if ($_SESSION['user_type'] == '2') {
        ?>
        <ul class="navbar-nav my-primary-color sidebar sidebar-dark accordion" id="accordionSidebar">
          <br>
          <br>
          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon ">
              <img src="./img/logo1.png" class="my-logo">
            </div>
          </a>
          <br>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item nav-home">
            <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-home"></i>
              <span class="body-text-menu">หน้าหลัก</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Supplies Collapse Menu -->
          <li class="nav-item nav-supplies">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplies" aria-expanded="true" aria-controls="collapseSupplies">
              <i class="fas fa-fw fa-box-open"></i>
              <span class="body-text-menu">วัสดุสิ้นเปลือง</span>
            </a>
            <div id="collapseSupplies" class="collapse collapse-supplies" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded body-text-menu">
                <a class="collapse-item supplies" href="display_supplies.php">แสดงข้อมูล</a>
                <a class="collapse-item purchase" href="display_supplies_purchase.php">จัดซื้อ</a>
                <!-- <a class="collapse-item permits" href="display_supplies_permits.php">ยืม-คืน</a> -->
                <a class="collapse-item distribute" href="display_supplies_distribute_type.php">แจกจ่าย</a>
                <a class="collapse-item stock" href="display_supplies_stock.php">จำนวนคงเหลือ</a>
                <a class="collapse-item account" href="display_supplies_account.php">บัญชีคุมวัสดุ</a>
              </div>
            </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Department Collapse Menu -->
          <li class="nav-item nav-department">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
              <i class="fas fa-fw fa-city"></i>
              <span class="body-text-menu">หน่วยงาน</span>
            </a>
            <div id="collapseDepartment" class="collapse collapse-department" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded body-text-menu">
                <a class="collapse-item display" href="display_department.php">แสดงหน่วยงาน</a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-seller">
        <a class="nav-link collapsed" href="display_seller.php"  data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
        <i class="fas fa-fw fa-user"></i>
          <span class="body-text-menu">จัดการข้อมูลผู้ขาย</span>
        </a>
          <!-- Nav Item - Approve Collapse Menu -->
          <li class="nav-item nav-approve">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApprove" aria-expanded="true" aria-controls="collapseApprove">
              <i class="fas fa-fw fa-folder"></i>
              <span class="body-text-menu">รายการรออนุมัติ</span>
            </a>
            <div id="collapseApprove" class="collapse collapse-approve" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded body-text-menu">
                <a class="collapse-item display-request" href="display_supplies_request.php">แสดงรายการรออนุมัติ</a>
              </div>
            </div>
          </li>

          <li class="nav-item nav-setting">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
              <i class="fas fa-fw fa-setting"></i>
              <span class="body-text-menu">ตั้งค่า</span>
            </a>
            <div id="collapseSetting" class="collapse collapse-setting" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded body-text-menu">
                <a class="collapse-item displayun" href="display_unit.php">หน่วยนับ</a>
                <a class="collapse-item displaym" href="display_durable_material_type.php">ประเภทวัสดุ</a>
                <a class="collapse-item display" href="คู่มือการใช้งาน.pdf">คู่มือการใช้งาน</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service/service_logout.php">
              <i class="fas fa-fw fa-"></i>
              <span class="body-text-menu">ออกจากระบบ</span></a>
          </li>


          </li>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->
              <div class="col-md-4">
                <img src="./img/logosecretary.png" class="img-fluid">
              </div>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">
                      <?php
                        $sqlSelectApprove = "SELECT s.*, u.surname, u.lastname FROM supplies_request s, supplies_purchase_request p, user u";
                        $sqlSelectApprove .= " WHERE p.product_id = s.id and s.status_request = 'waiting_approve' and s.user_request = u.id and u.id = " . $_SESSION["user_id"];
                        $resultApprove = mysqli_query($conn, $sqlSelectApprove);
                        echo mysqli_num_rows($resultApprove) <= 0 ? "0" : mysqli_num_rows($resultApprove);
                        ?>
                    </span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h4 class="dropdown-header bg-danger" style="border: none">
                      แจ้งเตือน
                    </h4>
                    <?php
                      $count = 1;
                      while ($rowApproveNavbar = mysqli_fetch_assoc($resultApprove)) {
                        $colorRequest = "bg-primary";
                        $iconRequest = "fa-file-alt";
                        if ($rowApproveNavbar["action_request"] == "request_update") {
                          $iconRequest = "fa-file-alt";
                          $colorRequest = "bg-primary";
                        } else {
                          $iconRequest = "fa-exclamation-triangle";
                          $colorRequest = "bg-danger";
                        }
                        if ($count > 3) {
                          break;
                        }
                        ?>
                      <a class="dropdown-item d-flex align-items-center" href="view_supplies_purchase_request.php?id=<?php echo $rowApproveNavbar["id"]; ?>">
                        <div class="mr-3">
                          <div class="icon-circle <?php echo $colorRequest; ?>">
                            <i class="fas <?php echo $iconRequest; ?> text-white"></i>
                          </div>
                        </div>
                        <div>
                          <div class="small text-gray-500"><?php echo $rowApproveNavbar["surname"] . " " . $rowApproveNavbar["lastname"]; ?></div>
                          <span class="font-weight-bold"><?php echo $rowApproveNavbar["reason"]; ?></span>
                        </div>
                      </a>
                    <?php $count++;
                      } ?>
                    <a class="dropdown-item text-center small text-gray-500 body-text-menu" href="display_supplies_request.php">แสดงแจ้งเตือนทั้งหมด</a>
                  </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["fullname"]; ?></span>
                    <img class="img-profile rounded-circle" src="img/admin.png">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="service/service_logout.php">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 body-text-menu"></i>
                      ออกจากระบบ
                    </a>
                  </div>
                </li>

              </ul>

            <?php } ?>