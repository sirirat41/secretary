<?php
require "service/connection.php";
ob_start();
ob_get_clean();
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=tablesql.xls" );

$fields = "";
$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'durable_articles'";
$result = mysqli_query($conn, $sql);
while($columnNames = mysqli_fetch_assoc($result)) {
    $fields .= $columnNames["COLUMN_NAME"] . "\t";
}
echo $fields;

die();


