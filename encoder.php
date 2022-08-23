<?php

require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
$dir = 'in';
$files = scandir($dir);
unset($files[0], $files[1]);

foreach ($files as $file){
    $path = $dir .'/' . $file;
    $webp = Image::make($path)->encode('webp', 100);
    $arr = explode('.', $file);
    array_pop($arr);
    $webp->save("out/" . implode('', $arr) . '.webp');
}