<?php
require "service/connection.php";
$sqlA = "SELECT COUNT(id) as totalA FROM durable_articles";
$resultA = mysqli_query($conn, $sqlA);
$rowa = mysqli_fetch_assoc($resultA);
$sqlM = "SELECT COUNT(id) as totalM FROM durable_material";
$resultM = mysqli_query($conn, $sqlM);
$rowm = mysqli_fetch_assoc($resultM);
$sqlS = "SELECT COUNT(id) as totalS FROM supplies";
$resultS = mysqli_query($conn, $sqlS);
$rows = mysqli_fetch_assoc($resultS);

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
  <secretary style="display : none">dashboard</secretary>

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
          <div class="col-md-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <nav class="navbar navbar-light bg-light">
                  <h6 class="m-0 font-weight-bold">
                    <div class="card-icon text-danger"><i class="fas fa-business-time"> ครุภัณฑ์</i></div>
                    <div class="card-header card-header-warning card-header-icon">
                      <h3 class="card-title text-danger">
                        <?php
                        echo $rowa["totalA"];
                        ?>
                        <small>ชิ้น</small>
                      </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons"></i>
                        <a href='display_durable_articles.php'>แสดงรายการครุภัณฑ์</a>
                      </div>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <nav class="navbar navbar-light bg-light">
                  <h6 class="m-0 font-weight-bold">
                    <div class="card-icon text-danger"><i class="fas fa-business-time"> วัสดุคงทน</i></div>
                    <div class="card-header card-header-warning card-header-icon">
                      <h3 class="card-title text-danger">
                        <?php
                        echo $rowm["totalM"];
                        ?>
                        <small>ชิ้น</small>
                      </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons"></i>
                        <a href='display_durable_material.php'>แสดงรายการวัสดุคงทน</a>
                      </div>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <nav class="navbar navbar-light bg-light">
                  <h6 class="m-0 font-weight-bold">
                    <div class="card-icon text-danger"><i class="fas fa-business-time"> วัสดุสิ้นเปลือง</i></div>
                    <div class="card-header card-header-warning card-header-icon">
                      <h3 class="card-title text-danger">
                        <?php
                        echo $rows["totalS"];
                        ?>
                        <small>ชิ้น</small>
                      </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons"></i>
                        <a href='display_supplies.php'>แสดงรายการวัสดุสิ้นเปลือง</a>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
      <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
      <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
      <script>
        am4core.ready(function() {

          // Themes begin
          am4core.useTheme(am4themes_dataviz);
          am4core.useTheme(am4themes_animated);
          // Themes end

          // Create chart instance
          var chart = am4core.create("chartdiv", am4charts.XYChart);

          // Increase contrast by taking evey second color
          chart.colors.step = 2;

          // Add data
          chart.data = generateChartMonth();

          // Create axes
          var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
          dateAxis.renderer.minGridDistance = 50;

          // Create series
          function createAxisAndSeries(field, name, opposite, bullet) {
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = field;
            series.dataFields.dateX = "date";
            series.strokeWidth = 2;
            series.yAxis = valueAxis;
            series.name = name;
            series.tooltipText = "{name}: [bold]{valueY}[/]";
            series.tensionX = 0.8;

            var interfaceColors = new am4core.InterfaceColorSet();

            switch (bullet) {
              case "triangle":
                var bullet = series.bullets.push(new am4charts.Bullet());
                bullet.width = 12;
                bullet.height = 12;
                bullet.horizontalCenter = "middle";
                bullet.verticalCenter = "middle";

                var triangle = bullet.createChild(am4core.Triangle);
                triangle.stroke = interfaceColors.getFor("background");
                triangle.strokeWidth = 2;
                triangle.direction = "top";
                triangle.width = 12;
                triangle.height = 12;
                break;
              case "rectangle":
                var bullet = series.bullets.push(new am4charts.Bullet());
                bullet.width = 10;
                bullet.height = 10;
                bullet.horizontalCenter = "middle";
                bullet.verticalCenter = "middle";

                var rectangle = bullet.createChild(am4core.Rectangle);
                rectangle.stroke = interfaceColors.getFor("background");
                rectangle.strokeWidth = 2;
                rectangle.width = 10;
                rectangle.height = 10;
                break;
              default:
                var bullet = series.bullets.push(new am4charts.CircleBullet());
                bullet.circle.stroke = interfaceColors.getFor("background");
                bullet.circle.strokeWidth = 2;
                break;
            }

            valueAxis.renderer.line.strokeOpacity = 1;
            valueAxis.renderer.line.strokeWidth = 2;
            valueAxis.renderer.line.stroke = series.stroke;
            valueAxis.renderer.labels.template.fill = series.stroke;
            valueAxis.renderer.opposite = opposite;
            valueAxis.renderer.grid.template.disabled = true;
          }

          createAxisAndSeries("articles", "ครุภัณฑ์", false, "circle");
          createAxisAndSeries("material", "วัสดุคงทน", true, "triangle");
          createAxisAndSeries("supplies", "วัสดุสิ้นเปลือง", true, "rectangle");

          // Add legend
          chart.legend = new am4charts.Legend();

          // Add cursor
          chart.cursor = new am4charts.XYCursor();


          // generate some random data, quite different range
          function generateChartMonth() {
            var chartData = [];
            var firstDate = new Date();
            firstDate.setMonth(firstDate.getMonth() - 6);
            var articles = 100;
            var material = 100;
            var supplies = 100;

            <?php
            $jsonA = array();
            $jsonM = array();
            $jsonS = array();

            for ($i = 6; $i > 0; $i--) {
              $year = date('Y', strtotime("-$i months"));
              $month = date('m', strtotime("-$i months"));

              $date = new DateTime();
              $date->setDate($year, $month, 1);
              $useDate = $date->format('Y-m-d');
              $sqlArticles = "SELECT COUNT(*) as total FROM durable_articles a, durable_articles_purchase p ";
              $sqlArticles .= " WHERE a.id = p.product_id and p.receive_date < '$useDate'";
              $sqlMaterial = "SELECT COUNT(*) as total FROM durable_material m, durable_material_purchase p ";
              $sqlMaterial .= " WHERE m.id = p.product_id and p.receive_date < '$useDate'";
              $sqlSupplies = "SELECT COUNT(*) as total FROM supplies s, supplies_purchase p ";
              $sqlSupplies .= " WHERE s.id = p.product_id and p.receive_date < '$useDate'";
              $resultA = mysqli_query($conn, $sqlArticles);
              $totalA = (mysqli_fetch_assoc($resultA))["total"];
              $resultM = mysqli_query($conn, $sqlMaterial);
              $totalM = (mysqli_fetch_assoc($resultM))["total"];
              $resultS = mysqli_query($conn, $sqlSupplies);
              $totalS = (mysqli_fetch_assoc($resultS))["total"];
              array_push($jsonA, $totalA);
              array_push($jsonM, $totalM);
              array_push($jsonS, $totalS);
            }
            ?>
            var dataA = <?php echo json_encode($jsonA); ?>;
            var dataM = <?php echo json_encode($jsonM); ?>;
            var dataS = <?php echo json_encode($jsonS); ?>;
            for (var i = 0; i < 6; i++) {
              var newDate = new Date(firstDate);
              newDate.setMonth(newDate.getMonth() + i);

              articles = dataA[i];
              material = dataM[i];
              supplies = dataS[i];

              chartData.push({
                date: newDate,
                articles: articles, //1000
                material: material, //1500
                supplies: supplies //2000

              });
            }
            return chartData;
          }

        }); // end am4core.ready()
      </script>

      <!-- HTML -->
      <div id="chartdiv"></div>
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