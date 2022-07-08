<?php session_start();
  include_once 'captchaWord.php';
  $word = $_SESSION['captcha'];

  $image = imagecreatetruecolor(300, 100); // создание пустого изображения размером 300 на 100
  $colorsList = [
    [[192,192,192],[0,0,0]],
    [[0,0,0],[255,255,255]],
    [[139,0,0],[255,255,255]],
    [[255,255,0],[0,0,0]],
    [[30,144,255],[255,255,255]],
    [[152,152,152],[255,255,255]],
    [[255,165,0],[0,0,0]],
  ];
  $colorRandom = rand(0,count($colorsList) - 1);
  
  $colorBackground = $colorsList[$colorRandom];
  $colorBackground = imagecolorallocate($image,$colorBackground[0][0],$colorBackground[0][1],$colorBackground[0][2]);
  
  imagefilledrectangle($image,0,0,300,100,$colorBackground); // заливка фона изображения
  $colorText = $colorsList[$colorRandom];
  
  $linenum = rand(6, 8); 
  // рисование линий
  for ($i=0; $i<$linenum; $i++)
  {
    $color = imagecolorallocate($image, rand(0, 150), rand(0, 100), rand(0, 150)); 
    imageline($image, rand(10, 40), rand(10, 150), rand(50, 280), rand(1, 100), $color);

    $color = imagecolorallocate($image, $colorText[1][0], $colorText[1][1], $colorText[1][2]); 
    imageline($image, rand(10, 40), rand(10, 150), rand(50, 280), rand(1, 100), $color);
  }
  $colorText = imagecolorallocate($image,$colorText[1][0],$colorText[1][1],$colorText[1][2]); // цвет текста

  $size = 26;
  $font =__DIR__.'/font.ttf';
  $angle = rand(-10, 10);
  $x = 78;
  $y = 60;
 
  imagefttext($image, $size, $angle, $x, $y, $colorText, $font, $word); // наносим текст

  header('Cache-Control: no-store, must-revalidate');
  header('Expires: 0');
  header('Content-Type: image/png');
  imagepng($image);  //вывод изображения
  imagedestroy($image);  // удаление изображения
?>