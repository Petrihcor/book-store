<?php

namespace App;

class View
{
    public function showPage(string $page, array|null $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        return require_once __DIR__ . "/../views/pages/{$page}.tpl.php";
    }
}