<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>z3</title>
</head>
<body>
<form action="z3.php" method="POST">
    <label>Zakres dat, od:</label>
    <input type="date" name='zakres1' required>
    <label>, do:</label>
    <input type="date" name='zakres2' required><br>
    <label for="los">Liczba osób</label>
    <input id="los" name='los' required><br>
    <label for="kraj">Kraj</label>
    <select id="kraj" name="kraj">
        <?php
        $tab=array(
            "Turcja"=>400,
            "Bulgaria"=>450,
            "Grecja"=>500,
            "Maroko"=>550
        );
        foreach($tab as $kraj => $cena){
           echo "<option value='$kraj'>$kraj</option>";
        }
        ?>

    </select><br>
    <input type="submit" value="Prześlij">
</form>

</body>
</html>
