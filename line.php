<?php

require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

$img = Image::canvas(100, 100, '#ddd');

$img->line(0, 0, 50, 50, function ($draw) {
    $draw->color('#0000ff');
});

$img->line(50, 50, 20, 50, function ($draw) {
    $draw->color('#ff0000');
});

$img->line(50, 50, 50, 20, function ($draw) {
    $draw->color('#ff0000');
});

$img->save('line.jpg');