<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'fishter911'");
$new_message1 = str_replace("visitor",$visitor, 'Hello Visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'KGSevenSixteen.ttf';
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
$im = imagecreatetruecolor ($width,81);
$background = imagecolorallocate($im, 237, 237, 237);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 60, 38, 255);
imagettftext($im, 19, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 19, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>