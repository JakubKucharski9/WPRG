<?php

if(isset($_GET['liczba1']) &&isset($_GET['liczba2']) &&isset($_GET['dzialanie'])){
    $liczba1 = $_GET['liczba1'];
    $liczba2 = $_GET['liczba2'];
    $dzialanie = $_GET['dzialanie'];
    $wynik = 0;
    include('z5skrypty.php');
    switch ($dzialanie) {
        case "Dodawanie":
            $wynik = dodawanie($liczba1,$liczba2);
            break;
        case 'Odejmowanie':
            $wynik = odejmowanie($liczba1,$liczba2);
            break;
        case 'Mnozenie':
            $wynik = mnozenie($liczba1,$liczba2);
            break;
        case 'Dzielenie':
            $wynik = dzielenie($liczba1,$liczba2);
        default:
            $wynik="Nie obsługuję takiego działania!";
    }
    print 'Wynik dzialania: ' . $wynik;
}



