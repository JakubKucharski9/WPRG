<?php
function dodaj($nazwa,$ilosc,$cena){
    if(!isset($_SESSION['koszyk'])){
        $_SESSION['koszyk']=array();
    }
    $produkt=array('nazwa' => $nazwa, 'ilosc' => $ilosc, 'cena' => $cena);
    array_push($_SESSION['koszyk'],$produkt);
}
function usun() {
    if (isset($_POST['usun'])) {
        $index = $_POST['usun'];
        if (isset($_SESSION['koszyk'][$index])) {
            unset($_SESSION['koszyk'][$index]);
            $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
        }
    }
}

function wyczysc() {
    unset($_SESSION['koszyk']);
}