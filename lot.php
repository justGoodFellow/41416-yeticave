<?php

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

require_once 'functions.php';
require_once 'lots-arrays.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $id = null;
}

if (!array_key_exists($id, $lots)) {
    header("HTTP/1.0 404 Not Found");

    die('404 - Страница не найдена');
}

$lot = $lots[$id];

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title><?= $lot['name'] ?></title>
        <link href="css/normalize.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        echo includeTemplate('templates/header.php');

        echo includeTemplate('templates/item.php', [
            'bets' => $bets,
            'lot' => $lot
        ]);

        echo includeTemplate('templates/footer.php');
        ?>
    </body>
</html>
