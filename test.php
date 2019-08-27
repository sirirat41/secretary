<<<<<<< HEAD
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
=======
<?php

echo autoRun(1, 4) . "<br>";
echo autoRun(5, 2) . "<br>";
echo autoRun(10, 5) . "<br>";
echo autoRun(10, 8) . "<br>";

function autoRun($current, $format){
  $auto = "";
  $diff = $format - strlen($current);
  for ($i = 0; $i < $diff; $i++) {
    $auto .= "0";
  }
  $auto .= $current; 
  
  return $auto;
}

?>
>>>>>>> 723fa8d6b8e6ac01de8bff0d0691cf3ab0e0eb74
