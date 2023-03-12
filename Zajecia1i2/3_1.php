<?php
$a=3;
tab($a);
function tab($a){
$tablica=array();
for($c=0;$c<$a+1;$c++){
    $tablica[]=rand();
}
echo $tablica[$a];
}