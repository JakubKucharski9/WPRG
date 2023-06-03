<!DOCTYPE html>
<html>
<head>
    <title>Wyszukiwarka hoteli</title>
    <style>

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .hotel-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
            display: inline-block;
            width: 300px;
            margin-right: 20px;
            margin-bottom: 20px;
            vertical-align: top;
        }

        .hotel-card h2 {
            margin-top: 0;
        }

        .hotel-card p {
            margin-bottom: 10px;
        }

        .hotel-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Wyszukiwarka hoteli</h1>
    <div class="search-results">
        <?php

        $hotels = [];
        $file = fopen("hotele.csv", "r");
        if ($file !== false) {
            while (($data = fgetcsv($file)) !== false) {
                $hotel = [
                    "id" => $data[0],
                    "name" => $data[1],
                    "price" => $data[2],
                    "area" => $data[3],
                    "capacity" => $data[4],
                    "wifi" => $data[5],
                    "kitchen" => $data[6],
                    "image" => $data[7],
                    "description" => $data[8]
                ];
                $hotels[] = $hotel;
            }
            fclose($file);
        }

        session_start();
        $_SESSION['hotels'] = $hotels;

        if (count($hotels) > 0) {
            foreach ($hotels as $hotel) {
                echo '<div class="hotel-card">';
                echo '<h2>'.$hotel["name"].'</h2>';
                echo '<h3>'.$hotel["description"].'</h3>';
                echo '<p>Cena za noc: '.$hotel["price"].' zł</p>';
                echo '<a href="hotel.php?id='.$hotel["id"].'"><img src="'.$hotel["image"].'" alt="'.$hotel["name"].'"></a>';
                echo '</div>';
            }
        } else {
            echo '<p>Brak dostępnych hoteli.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
