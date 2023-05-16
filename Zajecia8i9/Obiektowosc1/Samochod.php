<?php
class Samochod
{
private $id;
private $marka;
private $model;
private $rok;
private $cena;
private $pojemnosc;
private $zdjecie;
    public function __construct($id, $marka, $model, $rok, $cena, $pojemnosc, $zdjecie) {
        $this->id = $id;
        $this->marka = $marka;
        $this->model = $model;
        $this->rok = $rok;
        $this->cena = $cena;
        $this->pojemnosc = $pojemnosc;
        $this->zdjecie = $zdjecie;
    }
    public function wyswietlSamochod() {
        // Wyświetlanie danych samochodu
        echo "ID: " . $this->id . "<br>";
        echo "Marka: " . $this->marka . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Rok: " . $this->rok . "<br>";
        echo "Cena: " . $this->cena . "<br>";
        echo "Pojemność: " . $this->pojemnosc . "<br>";
        echo "Link do zdjęcia: " . $this->zdjecie . "<br>";
    }
}
$samochody = array();

if (($handle = fopen("dane.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $id = $data[0];
        $marka = $data[1];
        $model = $data[2];
        $rok = $data[3];
        $cena = $data[4];
        $pojemnosc = $data[5];
        $zdjecie = $data[6];

        $samochod = new Samochod($id, $marka, $model, $rok, $cena, $pojemnosc, $zdjecie);
        $samochody[] = $samochod;
    }
    fclose($handle);
}
if (isset($_GET['id'])) {
    $idSamochodu = $_GET['id'];
    foreach ($samochody as $samochod) {
        if ($samochod->getId() == $idSamochodu) {
            echo $samochod->wyswietlSamochod();
            break;
        }
    }
}else{
    foreach ($samochody as $samochod) {
        echo "Marka: " . $samochod->getMarka() . "<br>";
        echo "<a href='samochod.php?id=" . $samochod->getId() . "'><img src='" . $samochod->getZdjecie() . "'></a><br>";
    }
}