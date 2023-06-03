<!DOCTYPE html>
<html>
<head>
    <title>Rezerwacja</title>
    <style>

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .reservation-form {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
        }

        .reservation-form h2 {
            margin-top: 0;
        }

        .reservation-form label {
            display: block;
            margin-bottom: 10px;
        }

        .reservation-form input[type="text"],
        .reservation-form input[type="date"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .reservation-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reservation-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Rezerwacja</h1>
    <div class="reservation-form">
        <?php
        session_start();
        if (isset($_SESSION['hotels'])) {
            $hotels = $_SESSION['hotels'];


            if (isset($_POST['room-id']) && isset($_POST['check-in']) && isset($_POST['check-out'])) {
                $roomId = $_POST['room-id'];
                $checkIn = $_POST['check-in'];
                $checkOut = $_POST['check-out'];


                if ($checkIn < $checkOut) {
                    $room = null;
                    foreach ($hotels as $hotel) {
                        if ($hotel['id'] == $roomId) {
                            $room = $hotel;
                            break;
                        }
                    }


                    $isAvailable = true;
                    if (isset($_SESSION['reservations'][$roomId])) {
                        $reservations = $_SESSION['reservations'][$roomId];
                        foreach ($reservations as $reservation) {
                            $reservationCheckIn = $reservation['check-in'];
                            $reservationCheckOut = $reservation['check-out'];
                            if ($checkIn <= $reservationCheckOut && $checkOut >= $reservationCheckIn) {
                                $isAvailable = false;
                                break;
                            }
                        }
                    }

                    if ($room !== null && $isAvailable) {
                        echo '<h2>'.$room['name'].'</h2>';
                        echo '<p>Data zameldowania: '.$checkIn.'</p>';
                        echo '<p>Data wymeldowania: '.$checkOut.'</p>';
                        echo '<p>Cena za noc: '.$room['price'].' zł</p>';


                        $checkInDate = new DateTime($checkIn);
                        $checkOutDate = new DateTime($checkOut);
                        $diff = $checkInDate->diff($checkOutDate);
                        $numOfNights = $diff->days;


                        $totalPrice = $numOfNights * $room['price'];
                        echo '<p>Liczba nocy: '.$numOfNights.'</p>';
                        echo '<p>Całkowita cena: '.$totalPrice.' zł</p>';


                        $reservation = array(
                            'check-in' => $checkIn,
                            'check-out' => $checkOut
                        );
                        if (!isset($_SESSION['reservations'][$roomId])) {
                            $_SESSION['reservations'][$roomId] = array();
                        }
                        $_SESSION['reservations'][$roomId][] = $reservation;

                    } else {
                        echo '<p>Nie znaleziono pokoju lub jest już zarezerwowany w podanym terminie.</p>';
                    }
                } else {
                    echo '<p class="error">Data zameldowania musi być wcześniejsza niż data wymeldowania.</p>';
                }
            } else {
                echo '<p class="error">Nieprawidłowe dane rezerwacji.</p>';
            }
        } else {
            echo '<p>Brak dostępnych hoteli.</p>';
        }
        ?>


    </div>
</div>
</body>
</html>
