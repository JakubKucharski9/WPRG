<?php
if(isset($_COOKIE['ciastko'])){
    echo "Juz glosowaleś w sondzie!<br>";

}else{
    if(isset($_POST['glos'])) {
        setcookie("ciastko", true, time() + 15);
        echo "Oddałeś głos";
    }else{
            ?>
            <form method="post">
            <label>Kto jest dobry według Ciebie?</label><br>
            <label>Republika<input type="radio" name="glos" value="Republika"></label><br>
            <label>Imperium<input type="radio" name="glos" value="Imperium"></label><br>
            <label>Rebelia<input type="radio" name="glos" value="Rebelia"></label><br>
            <input type="submit" value="Prześlij">
            </form>

        <?php
    }
}
?>
