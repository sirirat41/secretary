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
  <secretary> </secretary>

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
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <div class="ct-chart" id="dailySalesChart"></div>
                <style>
                  #chartdiv {
                    width: 100%;
                    height: 250px;
                  }
                </style>
                <!-- Resources -->
                <script src="https://www.amcharts.com/lib/4/core.js"></script>
                <script src="https://www.amcharts.com/lib/4/charts.js"></script>
                <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

                <!-- Chart code -->
                <script>
                  am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    var chart = am4core.create("chartdiv", am4charts.XYChart);
                    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                    chart.data = [{
                        country: "ม.ค",
                        visits: 23725
                      },
                      {
                        country: "ก.พ",
                        visits: 1882
                      },
                      {
                        country: "มี.ค",
                        visits: 1809
                      },
                      {
                        country: "เม.ษ",
                        visits: 1322
                      },
                      {
                        country: "พ.ค",
                        visits: 1122
                      },
                      {
                        country: "มิ.ย",
                        visits: 1114
                      },
                      {
                        country: "ก.ค",
                        visits: 984
                      },
                      {
                        country: "ส.ค",
                        visits: 711
                      },
                      {
                        country: "ก.ย",
                        visits: 665
                      },
                      {
                        country: "ต.ค",
                        visits: 580
                      },
                      {
                        country: "พ.ย",
                        visits: 443
                      },
                      {
                        country: "ธ.ค",
                        visits: 441
                      }
                    ];

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.dataFields.category = "country";
                    categoryAxis.renderer.minGridDistance = 40;
                    categoryAxis.fontSize = 11;

                    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.min = 0;
                    valueAxis.max = 24000;
                    valueAxis.strictMinMax = true;
                    valueAxis.renderer.minGridDistance = 30;
                    // axis break
                    var axisBreak = valueAxis.axisBreaks.create();
                    axisBreak.startValue = 2100;
                    axisBreak.endValue = 22900;
                    axisBreak.breakSize = 0.005;

                    axisBreak.defaultState.transitionDuration = 1000;
                    var series = chart.series.push(new am4charts.ColumnSeries());
                    series.dataFields.categoryX = "country";
                    series.dataFields.valueY = "visits";
                    series.columns.template.tooltipText = "{valueY.value}";
                    series.columns.template.tooltipY = 0;
                    series.columns.template.strokeOpacity = 0;

                    series.columns.template.adapter.add("fill", function(fill, target) {
                      return chart.colors.getIndex(target.dataItem.index);
                    });

                  }); // end am4core.ready()
                </script>

                <!-- HTML -->
                <div id="chartdiv"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title text">จำนวนครุภัณฑ์</h4>
                <p class="card-category">
                  <span class=""></span>จำนวนครุภัณฑ์คงที่ในเดือนนี้</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i> อัพเดทเมื่อ 4 นาทีก่อน
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <h6 class="text-danger">
                  <div class="card-icon">
                    <i class="fas fa-business-time"> ครุภัณฑ์</i>
                  </div>
                  <h3 class="card-title">25
                    <small>ชิ้น</small>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i>
                  <a href="#">แสดงรายการครุภัณฑ์</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-success">
                <div class="ct-chart" id="websiteViewsChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">จำนวนวัสดุคงทน</h4>
                <p class="card-category">
                  <span class="text-success">
                    <i class="fa fa-long-arrow-up"> </i> 40%
                  </span>
                  จำนวนวัสดุคงทนเพิ่มขึ้น
                </p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i> อัพเดทเมื่อ 4 นาทีก่อน
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <h6 class="text-danger">
                  <div class="card-icon">
                    <i class="fas fa-business-time"> วัสดุคงทน</i>
                  </div>
                  <h3 class="card-title">170
                    <small>ชิ้น</small>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i>
                  <a href="#">แสดงรายการวัสดุคงทน</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-info">
                <div class="ct-chart" id="websiteViewsChart1"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">จำนวนวัสดุสำนักงาน</h4>
                <p class="card-category">
                  <span class="text-danger">
                    <i class="fa fa-long-arrow-down"> </i> 8%
                  </span>
                  จำนวนวัสดุคงทนลดลง
                </p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i> อัพเดทเมื่อ 4 นาทีก่อน
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <h6 class="text-danger">
                  <div class="card-icon">
                    <i class="fas fa-business-time"> วัสดุสำนักงาน</i>
                  </div>
                  <h3 class="card-title">912
                    <small>ชิ้น</small>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i>
                  <a href="#">แสดงรายการวัสดุสำนักงาน</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-danger">
                <div class="ct-chart" id="completedTasksChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">จำนวนชำรุดและส่งซ่อม</h4>
                <p class="card-category">
                  <span class="text-danger">
                    <i class="fa fa-long-arrow-up"> </i> 15%
                  </span>
                  จำนวนชำรุดและส่งซ่อมเพิ่มขึ้น
                </p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i> อัพเดทเมื่อ 4 นาทีก่อน
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <h6 class="text-danger">
                  <div class="card-icon">
                    <i class="fas fa-business-time">ชำรุด & ส่งซ่อม</i>
                  </div>
                  <h3 class="card-title">30
                    <small>ชิ้น</small>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"></i>
                  <a href="#">แสดงรายการชำรุดและส่งซ่อม</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>By &copy; Sirirat Napaporn Bongkotchaporn</span>
        </div>
      </div>
    </footer>
  </div>
  </div>

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

</html>