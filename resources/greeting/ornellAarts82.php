<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ornellAarts'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my DA home!      ');
$font = './uploaded_fonts/' . 'Monotype Corsiva.ttf';
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,108);
$background = imagecolorallocate($im, 255, 255, 219);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 3, 3, 3);
imagettftext($im, 34, 0, 0, 43, $color, $font, $new_message1);
imagettftext($im, 34, 0, 0, 93, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>