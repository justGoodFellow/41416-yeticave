<?php

function includeTemplate($path, $data)
{
    if (!file_exists($path)) {
        return '';
    }

    ob_start();

    $strip_data = strip_tags($data);
    include "$path";

    $template = ob_end_flush();

    return $template;
}
