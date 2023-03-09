<?php
$a=10;
$b=8;
$c=6;
if($c>$a && $c>$b){
    if(($a*$a)+($b*$b)==($c*$c)) echo "Spełnia twierdzenie";
    else echo "Nie spełnia twierdzenia";
}
elseif($b>$a && $b>$c){
    if(($a*$a)+($c*$c)==($b*$b)) echo "Spełnia twierdzenie";
    else echo "Nie spełnia twierdzenia";
}
elseif($a>$b && $a>$c){
    if(($b*$b)+($c*$c)==($a*$a)) echo "Spełnia twierdzenie";
    else echo "Nie spełnia twierdzenia";
}
else echo "Nie spełnia twierdzenia";
?>