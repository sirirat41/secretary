<?php
<<<<<<< HEAD
echo autoRun(1, 4) ."<br>";
echo autoRun(5, 2) ."<br>";
echo autoRun(10, 5) ."<br>";
echo autoRun(10, 8) ."<br>";

function autoRun ($current, $format){

 $auto = "";
 $diff = $format - strlen($current);

 for ($i = 0; $i < $diff; $i++) {
   $auto .= "0";
   
 }
 $auto .= $current;
  return $auto;

}
=======

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

>>>>>>> a096f2507ef72ea50ddc2c6025dfa7b7bfa1c327
?>