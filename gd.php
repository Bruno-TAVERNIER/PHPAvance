<?php

// l'image à modifier
$img = imagecreatefromjpeg('images/photo.jpeg');
// tampon
$tampon = imagecreatefrompng('images/stamp.png');

//marges pour le cachet
$margeR = 10;
$margeB = 10;
// hauteur et largeur du tampon
$x = imagesx($tampon);
$y = imagesy($tampon);

//copie du tampon sur l'image en utilisant les marges
imagecopy($img, $tampon, imagesx($img) - $x - $margeR, imagesy($img) - $y - $margeB, 0 , 0, $x, $y );

//entete image pour le navigateur
header('Content-type: image/png');
imagepng($img);
imagedestry($img); //ressources