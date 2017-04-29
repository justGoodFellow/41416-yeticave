<?php

function includeTemplate(string $path, array $data)
{
    if (!file_exists($path)) {
        trigger_error('Файла не существует');
    }

    ob_start();

    $strip_data = htmlentities($data);
    include $path;

    return ob_end_flush();
}
