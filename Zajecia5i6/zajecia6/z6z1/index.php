<html>
<body>
<form method="post" action="">
    <select name="glowne">
        <?php
        include('dane.php');
        if (isset($jedzenie)) {
            foreach ($jedzenie as $nazwa => $cena){
                echo "<option value=\"$nazwa\">$nazwa - $cena zł</option>";
            }
        }
        ?>
    </select><br>
    <label for="dodatki[]">Dodatki:</label>
    <?php
        if(isset($cennikdodatki)){
            foreach ($cennikdodatki as $nazwa => $cena){
                echo "<br><input type=\"checkbox\" name=\"dodatki[]\" value=\"$nazwa\">$nazwa - $cena zł";
            }
        }
    ?>
    <br>
    <label for="ilosc">Ilość sztuk: </label>
    <input type="number" name="ilosc" min="1">
    <br>

    <label for="uwagi">Uwagi:</label><br>
    <textarea name="uwagi"></textarea>
    <br>

    <input type="submit" name="submit" value="Zamów">
</form>
<?php
if (isset($_POST['submit'])) {
    include('funkcje.php');

    $rodzaj = $_POST['glowne'];
    $dodatki = isset($_POST['dodatki']) ? $_POST['dodatki'] : array();
    $ilosc = $_POST['ilosc'];
    $uwagi = $_POST['uwagi'];

    if ($rodzaj && $ilosc) {
        $cena = oblicz($rodzaj, $ilosc, $dodatki);
        echo "<p>Cena: $cena zł</p>";
        if ($uwagi) {
            echo "<p>Uwagi: $uwagi</p>";
        }
    } else {
        echo "<p>Proszę wybrać rodzaj jedzenia i podać ilość sztuk.</p>";
    }
}
?>
</body>
</html>
