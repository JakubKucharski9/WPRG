<?php
$liczba1=(int)$_GET['liczba1'];
$liczba2=(int)$_GET['liczba2'];
$dzialanie=$_GET['dzialanie'];
$wynik=0;
switch ($dzialanie){
    case "Dodawanie":
        $wynik=$liczba1+$liczba2;break;
    case 'Odejmowanie':
        $wynik=$liczba1-$liczba2;break;
    case 'Mnozenie':
        $wynik=$liczba1*$liczba2;break;
    case 'Dzielenie':
        if($liczba2==0){
            echo "Nie dziel przez 0";
            exit;
        } else {
            $wynik=$liczba1/$liczba2;break;
        }
}
print 'Wynik dzialania: '.$wynik;

