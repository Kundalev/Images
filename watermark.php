<?php

require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('public/img.jpg'); //your image I assume you have in public directory
$watermark = Image::make('public/egorov.png')->resize(100, 100);
$img->insert($watermark, 'bottom-right', 10, 10); //insert watermark in (also from public_directory)
$img->save('public/img+watermark.jpg');