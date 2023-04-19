<?php
$filename = 'tablica.csv';
$file = fopen($filename, 'r');

$data = array();
while (($row = fgetcsv($file, 1000, ',')) !== false) {
    $data[] = [
        'nazwa' => $row[0],
        'link' => $row[1],
        'tresc' => $row[2],
    ];
}

echo '<ul>';
foreach ($data as $podstrona) {
    echo '<li><a href="?link=' . $podstrona['link'] . '">' . $podstrona['nazwa'] . '</a></li>';
}
echo '</ul>';

if (isset($_GET['link'])) {
    $link = $_GET['link'];
    foreach ($data as $podstrona) {
        if ($podstrona['link'] === $link) {
            echo '<h2>' . $podstrona['nazwa'] . '</h2>';
            echo '<p>' . $podstrona['tresc'] . '</p>';
            break;
        }
    }
}