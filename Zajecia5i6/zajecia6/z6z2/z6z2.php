<html>
<body>
<form method="post">
    <?php
    $koszyk=session_start();
    include 'z6funkcje.php';
    $fd=fopen('produkty.csv','r');
    if($fd!==false){
        while (($row=fgetcsv($fd))!==false){
            $nazwa = $row[0];
            $ilosc = $row[1];
            $cena = $row[2];
            echo "$nazwa - $ilosc szt. - $cena zł<td>
    <input type='submit' name='dodaj_$nazwa' value='Dodaj do koszyka'>
    <input type='hidden' name='nazwa' value='$nazwa'>
    <input type='hidden' name='ilosc_$nazwa' value='$ilosc'>
    <input type='hidden' name='cena_$nazwa' value='$cena'> 
</td></tr><br>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $keys = array_keys($_POST);
        foreach ($keys as $key) {
            if (strpos($key, 'dodaj_') === 0) {
                $nazwa = substr($key, 6);
                $ilosc = $_POST['ilosc_'.$nazwa];
                $cena = $_POST['cena_'.$nazwa];
                dodaj($nazwa, $ilosc, $cena);
            }
        }
        if (isset($_POST['usun'])) {
            usun($_POST['index']);
        } elseif (isset($_POST['wyczysc'])) {
            wyczysc();
        }
    }

    ?>

</form>

<form method="post">
    <?php
    if (isset($_SESSION['koszyk'])) {
        foreach ($_SESSION['koszyk'] as $index => $produkt) {
            echo $produkt['nazwa'] . ' - ' . $produkt['ilosc'] . ' szt. - ' . $produkt['cena'] . ' zł';
            echo '<input type="hidden" name="index" value="' . $index . '">';
            echo '<button type="submit" name="usun" value="' . $index . '">Usuń z koszyka</button><br>';
        }
    } else {
        echo 'Koszyk jest pusty';
    }
    ?>
</form>


<form method="post">
    <button type="submit" name="wyczysc">Wyczyść koszyk</button>
</form>

</body>
</html>
