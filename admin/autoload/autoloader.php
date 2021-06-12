<?php
spl_autoload_register('autoload');

function autoload($className)
{
    $path = "../classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    include $fullPath;
}