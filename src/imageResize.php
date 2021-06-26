<?php
function imageResize($outfile, $infile, $percents, $quality) {
    $im = imagecreatefromjpeg($infile);
    $w = imagesx($im)*$percents/100;
    $h = imagesy($im)*$percents/100;
    $im1 = imagecreatetruecolor($w, $h);
    imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im));

    imagejpeg($im1, $outfile, $quality);
    imagedestroy($im);
    imagedestroy($im1);
    }
?>
