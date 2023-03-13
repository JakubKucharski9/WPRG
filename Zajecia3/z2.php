<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $liczba=$_POST['liczba'];
    if(filter_var($liczba, FILTER_VALIDATE_INT) && $liczba>0){
        echo 'calk';
    }
}
