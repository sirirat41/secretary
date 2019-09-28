<?php

/** PHPExcel */
require "service/connection.php";

/** PHPExcel_IOFactory - Reader */
include 'excel/classes/PHPExcel/IOFactory.php';


$inputFileName = "tablesql.xls";
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($inputFileName);


$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
  $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
  if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
    ++$r;
    foreach ($headingsArray as $columnKey => $columnHeading) {
      $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
    }
  }
}

//echo '<pre>';
//var_dump($namedDataArray);
//echo '</pre><hr />';

?>
<table width="500" border="1">
  <tr>
    <td>id</td>
    <td>seq</td>
    <td>code</td>
    <td>type</td>
    <td>atttibute</td>
    <td>model</td>
    <td>bill_no</td>
    <td>budget</td>
    <td>book_no</td>
    <td>department_id</td>
    <td>money_type</td>
    <td>acquiring</td>
    <td>d-gen</td>
    <td>asset_no</td>
    <td>seller_id</td>
    <td>goverment</td>
    <td>short_goverment</td>
    <td>unit</td>
    <td>price</td>
    <td>picture</td>
    <td>durable_year</td>
    <td>storage</td>
    <td>status</td>
  </tr>
  <?php
  foreach ($namedDataArray as $result) {
    ?>
    <tr>
      <td><?php echo $result["id"]; ?></td>
      <td><?php echo $result["seq"]; ?></td>
      <td><?php echo $result["code"]; ?></td>
      <td><?php echo $result["tyepe"]; ?></td>
      <td><?php echo $result["attribute"]; ?></td>
      <td><?php echo $result["model"]; ?></td>
      <td><?php echo $result["bill_no"]; ?></td>
      <td><?php echo $result["budget"]; ?></td>
      <td><?php echo $result["book_no"]; ?></td>
      <td><?php echo $result["department_id"]; ?></td>
      <td><?php echo $result["money_type"]; ?></td>
      <td><?php echo $result["acquiring"]; ?></td>
      <td><?php echo $result["d-gen"]; ?></td>
      <td><?php echo $result["asset_no"]; ?></td>
      <td><?php echo $result["seller_id"]; ?></td>
      <td><?php echo $result["goverment"]; ?></td>
      <td><?php echo $result["short_goverment"]; ?></td>
      <td><?php echo $result["unit"]; ?></td>
      <td><?php echo $result["price"]; ?></td>
      <td><?php echo $result["picture"]; ?></td>
      <td><?php echo $result["durable_year"]; ?></td>
      <td><?php echo $result["storage"]; ?></td>
      <td><?php echo $result["status"]; ?></td>
    </tr>
  <?php
  }
  ?>
</table>

<?php

require "service/connection.php";

/** PHPExcel_IOFactory - Reader */
include 'excel/classes/PHPExcel/IOFactory.php';


$inputFileName = "tablesql.xls";
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($inputFileName);

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
  $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
  if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
    ++$r;
    foreach ($headingsArray as $columnKey => $columnHeading) {
      $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
    }
  }
}

//echo '<pre>';
//var_dump($namedDataArray);
//echo '</pre><hr />';

//*** Connect to MySQL Database ***//
$objConnect = mysql_connect("localhost", "root", "root") or die(mysql_error());
$objDB = mysql_select_db("mydatabase");
$i = 0;
foreach ($namedDataArray as $result) {
  $i++;
  $strSQL = "";
  $strSQL .= "INSERT INTO customer ";
  $strSQL .= "(id,seq,code,type,arttibute,model,bill_no,budget,book_no,department_id,money_type,acquiring,d-gen,asset_no,seller_id,goverment,short_goverment,unit,price,picture,durable_year,storage,status) ";
  $strSQL .= "VALUES ";
  $strSQL .= "('" . $result["id"] . "','" . $result["seq"] . "' ";
  $strSQL .= ",'" . $result["code"] . "','" . $result["type"] . "' ";
  $strSQL .= ",'" . $result["arttibute"] . "','" . $result["model"] . "') ";
  $strSQL .= "('" . $result["bill_no"] . "','" . $result["budget"] . "' ";
  $strSQL .= ",'" . $result["book_no"] . "','" . $result["department_id"] . "' ";
  $strSQL .= ",'" . $result["money_type"] . "','" . $result["acquiring"] . "') ";
  $strSQL .= "('" . $result["d-gen"] . "','" . $result["asset_no"] . "' ";
  $strSQL .= ",'" . $result["seller_id"] . "','" . $result["goverment"] . "' ";
  $strSQL .= ",'" . $result["short_goverment"] . "','" . $result["unit"] . "') ";
  $strSQL .= ",'" . $result["price"] . "','" . $result["picture"] . "' ";
  $strSQL .= ",'" . $result["durable_year"] . "','" . $result["storage"] . "') ";
  $strSQL .= ",'" . $result["status"] . "') ";
  mysql_query($strSQL) or die(mysql_error());
  echo "Row $i Inserted...<br>";
}
mysql_close($objConnect);
?>