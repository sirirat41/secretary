<<<<<<< HEAD
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
=======
<<<<<<< HEAD

=======
>>>>>>> 76ba85ee72c9013012cd8031aad17b0b07a3db94
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
<<<<<<< HEAD
}
=======
}

?>
>>>>>>> 76ba85ee72c9013012cd8031aad17b0b07a3db94
>>>>>>> f6fbc77bab3af3a74846cf08a9c5606775fdad34
