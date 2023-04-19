<?php
if(isset($_POST['text'])){
    $fd=fopen("z5z2plik.txt","a");
    fwrite($fd,$_POST['text']);
    fclose($fd);
}
