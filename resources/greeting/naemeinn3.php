<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'naemeinn'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,67);
$background = imagecolorallocate($im, 120, 16, 16);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 252, 255, 253);
imagettftext($im, 22, 0, 9, 40, $color, $font, $new_message1);
imagettftext($im, 22, 0, 93, 119, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>