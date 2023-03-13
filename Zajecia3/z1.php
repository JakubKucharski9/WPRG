<?php
$liczba1=$_GET['l1'];
$liczba2=$_GET['l2'];
$dzialanie=$_GET['d'];
$wynik=0;
if($dzialanie=='Ddo'){
    $wynik=$liczba1+$liczba2;
}
else if($dzialanie=='Do'){
    $wynik=$liczba1-$liczba2;
}
else if($dzialanie=='Dm'){
    $wynik=$liczba1*$liczba2;
}
else if($dzialanie=='Ddz'){
    if($liczba2==0){
        echo "Nie dziel przez 0";
        exit;
    }
    else $wynik=$liczba1/$liczba2;
}
echo 'Wynik dzialania: '.$wynik;

