<?php
// Charge la photo afin d'y appliquer le tatouage numérique
$im = imagecreatefromjpeg('images/photo.jpeg');

// Tout d'abord, nous créons un cachet manuellement grâce à GD
$tampon = imagecreatetruecolor(100, 70);
imagefilledrectangle($tampon, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($tampon, 9, 9, 90, 60, 0xFFFFFF);
imagestring($tampon, 5, 20, 20, 'libGD', 0x0000FF);
imagestring($tampon, 3, 20, 40, '(c) 2007-9', 0x0000FF);

// Définit les marges du cachet et récupère la largeur et la hauteur du cachet
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($tampon);
$sy = imagesy($tampon);

// Fusionne le cachet dans notre photo avec une opacité de 50%
imagecopymerge($im, $tampon, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, $sx, $sy, 50);

// Sauvegarde l'image dans un fichier et libère la mémoire
imagepng($im, 'images/photoStamp.png');
imagedestroy($im);
?>