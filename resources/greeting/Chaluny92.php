<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Chaluny'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
$font = './uploaded_fonts/' . 'cambria.ttc';
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
$im = imagecreatetruecolor ($width,129);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 41, 41);
imagettftext($im, 32, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 32, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>