<!DOCTYPE html>
<html>
<head>
    <title>Szczegóły hotelu</title>
    <style>

        .title{
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .hotel-details {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
        }

        .hotel-details h2 {
            margin-top: 0;
        }

        .hotel-details p {
            margin-bottom: 10px;
        }

        .hotel-details .image-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .hotel-details .image-container img {
            width: 45%;
            margin-bottom: 10px;
        }

        .hotel-details form {
            margin-top: 20px;
        }

        .hotel-details label {
            display: block;
            margin-bottom: 10px;
        }

        .hotel-details input[type="text"],
        .hotel-details input[type="date"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .hotel-details input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hotel-details input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Szczegóły hotelu</h1>
    <div class="hotel-details">
        <?php
        session_start();
        if (isset($_SESSION['hotels'])) {
            $hotels = $_SESSION['hotels'];

            if (isset($_GET['id'])) {
                $roomId = $_GET['id'];

                $room = null;
                foreach ($hotels as $hotel) {
                    if ($hotel['id'] == $roomId) {
                        $room = $hotel;
                        break;
                    }
                }

                if ($room !== null) {
                    echo '<h2 class="title">'.$room['name'].'</h2>';
                    echo '<p>Miasto: '.$room['description'].'</p>';
                    echo '<p>Cena za noc: '.$room['price'].' zł</p>';
                    echo '<p>Powierzchnia: '.$room['area'].' m<sup>2</sup></p>';
                    echo '<p>Pojemność: '.$room['capacity'].' osób</p>';
                    echo '<p>WiFi: '.($room['wifi'] ? 'Tak' : 'Nie').'</p>';
                    echo '<p>Kuchnia: '.($room['kitchen'] ? 'Tak' : 'Nie').'</p>';

                    $imageDir = $room['id'].'/';
                    $images = glob($imageDir.'*.jpg');
                    if (!empty($images)) {
                        echo '<div class="image-container">';
                        foreach ($images as $image) {
                            echo '<img src="'.$image.'" alt="'.$room['name'].'">';
                        }
                        echo '</div>';
                    } else {
                        echo '<p>Brak dostępnych zdjęć.</p>';
                    }

                    echo '<form action="rezerwacja.php" method="post">';
                    echo '<label for="check-in">Data zameldowania:</label>';
                    echo '<input type="date" id="check-in" name="check-in" required>';
                    echo '<label for="check-out">Data wymeldowania:</label>';
                    echo '<input type="date" id="check-out" name="check-out" required>';
                    echo '<input type="hidden" name="room-id" value="'.$roomId.'">';
                    echo '<input type="submit" value="Zarezerwuj">';
                    echo '</form>';
                } else {
                    echo '<p>Nie znaleziono pokoju.</p>';
                }
            } else {
                echo '<p>Nieprawidłowe ID pokoju.</p>';
            }
        } else {
            echo '<p>Brak dostępnych hoteli.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
