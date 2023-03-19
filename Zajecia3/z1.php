<?php
$liczba1=filter_var($_POST['l1'], FILTER_VALIDATE_INT);
$liczba2=filter_var($_POST['l2'], FILTER_VALIDATE_INT);
$dzialanie=$_POST['d'];
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

