<!DOCTYPE html>
<html>
<head>
    <title>Kółko i krzyżyk</title>
</head>
<body>
<?php
// Inicjujemy planszę gry
$board = array(
    array('_', '_', '_'),
    array('_', '_', '_'),
    array('_', '_', '_')
);

// Funkcja wyświetlająca planszę gry
function printBoard($board) {
    echo "<div class='board'>";
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo "<button onclick='makeMove(\"$i, $j\")'>" . $board[$i][$j] . "</button>";
        }
        echo "<br>";
    }
    echo "</div>";
}

// Funkcja sprawdzająca czy jest zwycięzca
function checkWinner($board, $player) {6
    // Sprawdzanie wierszy
    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player) {
            return true;
        }
    }
    // Sprawdzanie kolumn
    for ($j = 0; $j < 3; $j++) {
        if ($board[0][$j] == $player && $board[1][$j] == $player && $board[2][$j] == $player) {
            return true;
        }
    }
    // Sprawdzanie przekątnych
    if ($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player) {
        return true;
    }
    if ($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player) {
        return true;
    }
    return false;
}

// Funkcja do wykonywania ruchu
function makeMove($i, $j) {
    global $board, $turn;
    if ($board[$i][$j] == '_') {
        $board[$i][$j] = $turn;
        // Sprawdzamy czy jest zwycięzca
        if (checkWinner($board, $turn)) {
            echo "<h2>Wygrał gracz $turn!</h2>";
            printBoard($board);
            exit();
        }
        // Sprawdzamy czy plansza jest pełna
        $boardFull = true;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$i][$j] == '_') {
                    $boardFull = false;
                }
            }
        }
        if ($boardFull) {
            echo "<h2>Remis!</h2>";
            printBoard($board);
            exit();
        }
        // Przekazujemy ruch drugiemu graczowi
        $turn = $turn == 'X' ? 'O' : 'X';
        printBoard($board);
    } else {
        echo "<h3>To pole jest już zajęte, spróbuj ponownie</h3>";
    }
}
// Gracz zaczyna
$turn = 'X';

// Sprawdzamy czy jest wysłany formularz
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST['row'];
    $col = $_POST['col'];
    // Wykonujemy ruch
    if (makeMove($board, $turn, $row, $col)) {
        // Sprawdzamy czy jest zwycięzca
        if (checkWinner($board, $turn)) {
            echo "<h2>Wygrał gracz $turn!</h2>";
            printBoard($board);
            exit();
        }
        // Sprawdzamy czy plansza jest pełna
        $boardFull = true;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$i][$j] == '_') {
                    $boardFull = false;
                }
            }
        }
        if ($boardFull) {
            echo "<h2>Remis!</h2>";
            printBoard($board);
            exit();
        }
        // Przekazujemy ruch drugiemu graczowi
        $turn = $turn == 'X' ? 'O' : 'X';
    } else {
        echo "<h3>To pole jest już zajęte, spróbuj ponownie</h3>";
    }
}

echo "<h2>Kółko i krzyżyk</h2>";
echo "<p>Aktualny gracz: $turn</p>";
printBoard($board);
