<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
    <title>Galeria obrazów</title>
</head>
    <body>
    <?php
    $fullImgDir = "./full/";
    $thumbImgDir = "./img/";
    $fullImgs = scandir($fullImgDir);
    $thumbImgs = scandir($thumbImgDir);
    echo '<div id="miniatury" style="text-align: center">';

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $imgsPerPage = 4;
    $totalImgs = count($thumbImgs) - 2;
    $totalPages = ceil($totalImgs / $imgsPerPage);
    $startImg = ($page - 1) * $imgsPerPage + 2;
    $endImg = $startImg + $imgsPerPage - 1;

    for ($i = $startImg; $i <= $endImg; $i++) {
        if ($i >= 2 && $i < count($thumbImgs)) {
            $thumbImgPath = $thumbImgDir . $thumbImgs[$i];
            $fullImgPath = $fullImgDir . $fullImgs[$i];
            echo '<a href="zdjecie.php?id=' . ($i - 1) . '"><img src="' . $thumbImgPath . '" height=180 width=288></a>';
        }
    }

    echo '</div>';
    echo '<div style="text-align: center">';
    if ($page > 1) {
        echo '<a href="z7c1.php?page=' . ($page - 1) . '">Poprzednia strona</a> ';
    }
    if ($page < $totalPages) {
        echo '<a href="z7c1.php?page=' . ($page + 1) . '">Następna strona</a>';
    }
    echo '</div>';
    ?>
    </body>
</html>
