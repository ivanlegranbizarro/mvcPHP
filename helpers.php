<?php

function basePath(string $path): string
{
    return __DIR__ . '/' . $path;
}

function loadView(string $name, array $data = []): void
{
    $viewPath = basePath("views/$name.view.php");
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View not found: $viewPath";
    }
}


function loadPartial(string $name): void
{
    $partialPath = basePath("views/partials/$name.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial not found: $partialPath";
    }
}

function inspect(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function formatSalary(string $salary): string
{
    return number_format($salary, 0, '.', '.');
}
