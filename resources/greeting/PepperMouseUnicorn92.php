<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'PepperMouseUnicorn'");
$new_message1 = str_replace("visitor",$visitor, 'Sup, visitor! Welcome and hope you enjoy my page.');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (15 * strlen($longer_message));
$im = imagecreatetruecolor ($width,59);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 170, 196, 209);
imagettftext($im, 20, 0, 6, 36, $color, $font, $new_message1);
imagettftext($im, 20, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>