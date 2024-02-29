<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($route)
{
    return $_SERVER['REQUEST_URI'] === $route;
}