<?php

session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "Jesteś zalogowany";
    echo "<br><a href='logout.php'>Wyloguj</a>";
} else {
    header('Location: login.php');
}
