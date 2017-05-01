<?php

/**
 * @param int $time
 * @return bool|false|string
 */
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

    return date('d.m.y в H:i', $time);
}

/**
 * @param string $path
 * @param array $data
 * @return string
 */
function includeTemplate(string $path, array $data = []): string
{
    if (!file_exists($path)) {
        trigger_error('Файла ' . $path . ' не существует');
    }

    array_walk_recursive($data, function (&$item) {
        $item = htmlspecialchars($item);
    });

    $__path = $path;

    extract($data);

    ob_start();

    include $__path;

    return ob_get_clean();
}
