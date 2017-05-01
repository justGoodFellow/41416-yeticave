<?php
// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = '00:00';

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = time();

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining

$lot_time_remaining = gmdate('H:i', $tomorrow - $now);

require_once 'functions.php';
require_once 'lots-arrays.php';

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
    <body>
        <?php
        echo includeTemplate('templates/header.php');

        echo includeTemplate('templates/main.php', [
            'lot_time_remaining' => $lot_time_remaining,
            'categories' => $categories,
            'lots' => $lots
        ]);

        echo includeTemplate('templates/footer.php');
        ?>
    </body>
</html>
