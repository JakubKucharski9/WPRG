<?php
$imgDir = "./full/";
$id = $_GET['id'];
$imgs = scandir($imgDir);
$numOfImgs = count($imgs) - 2;

if ($id < 1 || $id > $numOfImgs) {
    echo "Nieprawidłowe id zdjęcia.";
    exit;
}

$prevId = ($id - 1) < 1 ? $numOfImgs : ($id - 1);
$nextId = ($id + 1) > $numOfImgs ? 1 : ($id + 1);

$currentImg = $imgs[$id + 1];
$currentImgPath = $imgDir . $currentImg;

echo '<img src="' . $currentImgPath . '">';
echo '<br>';
echo '<a href="z7c1.php">Powrót</a> ';
echo '<a href="zdjecie.php?id=' . $prevId . '">Poprzednie</a> ';
echo '<a href="zdjecie.php?id=' . $nextId . '">Następne</a>';
?>