<?php
function oblicz($rodzaj,$ilosc,$dodatki){
    include('dane.php');
    if (isset($jedzenie) && isset($cennikdodatki)) {
        $cenaj=$jedzenie[$rodzaj];
        $cenad=0;
        foreach ($dodatki as $dodatek){
            $cenad+=$cennikdodatki[$dodatek];
        }
        $cena=($cenad+$cenaj)*$ilosc;
        return $cena;
    }
}
