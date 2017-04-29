<?php

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

function humanTimeAgo(int $time)
{
    if ($time < 0) {
        return false;
    }

    $difference = time() - $time;

    if ($difference < 0) {
        return false;
    }

    $hours = round($difference / 3600);
    $minutes = round(($difference % 3600) / 60);

    if ($hours < 1) {
        if ($minutes == 0) {
            return 'меньше минуты назад';
        }

        return $minutes . ' минут назад';
    }

    if ($hours < 24) {
        return $hours . ' часов назад';
    }

    return date('d.m.Y в H:i', $time);
}

require 'functions.php';
require 'templates/item.php';
