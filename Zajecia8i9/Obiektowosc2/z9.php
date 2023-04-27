<?php
require_once('Pokemon.php');
require_once('Ogien.php');
require_once('Woda.php');
require_once('Piorun.php');
require_once('Walka.php');
$pika=new Piorun('Pikachu',150,70);
$charizard=new Ogien('Charizard',100,100);
$squirtle=new Woda('Squirtle',1000,100);
$fight=new Walka($charizard,$squirtle);
$fight->go();