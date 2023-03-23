<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['logged_in'] = true;
        header('Location: home.php');
    } else {
        echo "Niepoprawny login lub hasło";
        echo "<br><a href='login.php'>Powrót do formularza logowania</a>";
    }
} else {
    ?>
    <form method="post">
        Login: <input type="text" name="username" required><br>
        Hasło: <input type="password" name="password" required><br>
        <input type="submit" value="Zaloguj">
    </form>
    <?php
}
?>