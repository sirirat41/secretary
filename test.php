<?php
$totalPage = 19;
$showPageSection = 5;
$page = 1;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    $page = $page == 0 ? 1 : $page;
}
$countDiv = intdiv($page - 1, $showPageSection);
$start_i = ($countDiv * $showPageSection);
$sectionGroup = (($countDiv * $showPageSection) + $showPageSection);
$end_i =  $sectionGroup > $totalPage ? $totalPage : $sectionGroup;
for ($i = $start_i; $i < $end_i; $i++) {
    if ($i != 0 && $i == $start_i) {
        echo " <a style='font-size: 100px; margin-right: 100px' href='?page=" . $i . "'>...</a> ";
    }
    echo " <a style='font-size: 100px; margin-right: 100px' href='?page=" . ($i + 1) . "'>" . ($i + 1) . "</a> ";
    if (($i + 1) < $totalPage && $i == $end_i - 1) {
        echo " <a style='font-size: 100px; margin-right: 100px' href='?page=" . ($i + 2) . "'>...</a> ";
    }
}

