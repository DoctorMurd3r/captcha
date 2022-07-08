<?php 
  session_start();
  $letters = '123456789abcdefghijklmnpqrstuvwxyz';
  $length = 7;
  
  for($i=0;$i < $length; $i++){ // выбор случайных символов и добавление в массив
    $z = rand(0,strlen($letters) - 1); 
    $word[] = $letters[$z];
  }

  $word = implode($word); // склейка элементов массива в одну строку
  $_SESSION['captcha'] = $word;
  session_write_close();
?>