<?php
$m=2;
$r=1800;
$przestepne= array(1,3,5,7,8,10,12);
echo $m;
if ($m==2 && ($r%400==0 || ($r%4==0 && $r%100!=0))){
    echo " Miesiac ma 29 dni";
}
elseif ($m==2 && ( $r%4!=0 || $r%400!=0 ||  ($r%4==0 && $r%100==0))){
    echo " Miesiac ma 28 dni";
}
elseif($m== 1 || $m== 3 || $m== 5 || $m== 7 || $m== 8 || $m== 10 || $m== 12){
    echo " Miesiac ma 31 dni";
}
else{
    echo " Miesiac ma 30 dni";
}

