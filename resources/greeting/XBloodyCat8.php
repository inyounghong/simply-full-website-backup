<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'XBloodyCat'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome! have a nice day');
$font = './uploaded_fonts/' . 'CHERI___.TTF';
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
$width  = (32 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 245, 100, 100);
imagettftext($im, 37, 0, 186, 53, $color, $font, $new_message1);
imagettftext($im, 37, 0, 41, 115, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>