<?php

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

function includeTemplate(string $path, array $data = []): string
{
    if (!file_exists($path)) {
        trigger_error('Файла ' . $path . ' не существует');
    }

    ob_start();

    array_walk_recursive($data, function (&$item) {
        $item = htmlspecialchars($item);
    });

    extract($data);

    include $path;

    return ob_get_clean();
}
