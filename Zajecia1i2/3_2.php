<?php
$kraj="Rosja";

narodowosc($kraj);
function narodowosc($kraj){
    $narodowosc= array(
        "Polska"=>"Polak",
        "Niemcy"=>"Niemiec",
        "USA"=>"Amerykanin",
        "Ukraina"=>"Ukrainiec"
    );
    if(array_key_exists($kraj,$narodowosc)){
        echo "Twoja narodowosc to: ".$narodowosc[$kraj];
    }
    else echo "Brak kraju ".$kraj." w bazie danych";
}
