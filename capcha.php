<?php
session_start();
// include composer autoload
require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

function generate_string($strength = 6) {
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($str);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $str[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

function generate_color() {
    $strength = 6;
    $str = 'ABCDEF1234567890';
    $input_length = strlen($str);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $str[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return '#'.$random_string;
}


$capcha = generate_string();
$img = Image::canvas(150, 50, '#fefefe');

for ($i = 0; $i < strlen($capcha); $i++){
    $img->text($capcha[$i], 22 + $i*20, 15, function($font) {
        $font->file('ttf/RubikMaze-Regular.ttf');
        $font->size(30);
        $font->color(generate_color());
        $font->align('center');
        $font->valign('top');
        $font->angle(rand(-45, 45));
    });
}

$img->save('public/capcha.jpg', 100);

if ($_POST['capcha'] === $_SESSION["capcha"]){
    echo('Успешно');
}else{
    echo('Повторите попытку');
}

$_SESSION["capcha"] = $capcha;