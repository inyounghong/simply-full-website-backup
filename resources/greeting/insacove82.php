<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'insacove'");
$new_message1 = str_replace("visitor",$visitor, 'I really hope you enjoy ');
$new_message2 = str_replace("visitor",$visitor, 'browsing around, visitor!');
$font = './uploaded_fonts/' . 'trebuc.ttf';
# Determine the longer of the two  messages
if (strlen($new_message2) > 0)
{
    if (strlen($new_message1) <= strlen($new_message2))
    {
        $longer_message = $new_message2;
    }
    else
    {
        $longer_message = $new_message1;
    }
}
else
{
    $longer_message = $new_message1;
}
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,85);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 120, 120, 120);
imagettftext($im, 14, 0, 28, 20, $color, $font, $new_message1);
imagettftext($im, 14, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>