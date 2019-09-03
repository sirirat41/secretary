
<?php 

echo autoRun(1,4) . "<br>";
echo autoRun(5,2) . "<br>";
echo autoRun(10,5) . "<br>";
echo autoRun(10,8) . "<br>";

function autoRun($current, $format) {
    $auto = "";
    $diff = $format - strlen($current);
    for ($i = 0; $i < $diff; $i++) {
      $auto .= "0";
    }
  

    
    $auto .= $current;
    return $auto;
}