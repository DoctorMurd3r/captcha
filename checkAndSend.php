<?php 
session_start();
include_once 'db.php';

unset($_SESSION['captcha_success']);
unset($_SESSION['captcha_wrong']);

if($_POST['username'] && $_POST['email'] && $_POST['message'] && $_POST['captcha']){

    $usernameClient = htmlentities(htmlspecialchars($_POST['username']));
    $emailClient = htmlentities(htmlspecialchars($_POST['email']));
    $messageClient = htmlentities(htmlspecialchars($_POST['message']));
    $captcha = strtolower(htmlentities(htmlspecialchars($_POST['captcha'])));

    $client_ip = $_SERVER['REMOTE_ADDR']; // ip адрес пользователя

    $user_agent = $_SERVER['HTTP_USER_AGENT'] . PHP_EOL; // определение браузера пользователя
    if (strpos($user_agent, "Firefox")) $browser = "Firefox";
    elseif (stripos($user_agent,'OPR') || strpos($user_agent, "Opera")) $browser = "Opera";    
    elseif (strpos($user_agent, "MSIE") || stripos($user_agent,'Edg') ) $browser = "Internet Explorer";
    elseif (strpos($user_agent, "Chrome")) $browser = "Chrome";
    elseif (strpos($user_agent, "Safari")) $browser = "Safari";
    else $browser = "Неизвестный браузер";

    if($_SESSION['captcha'] == $captcha){

        $req = "INSERT INTO records (id, username, email, message, client_ip, client_browser_info) VALUES (NULL, '$usernameClient', '$emailClient', '$messageClient','$client_ip','$browser')";
        $conn->exec($req);

        $_SESSION['captcha_success'] = true;
        include_once 'captchaWord.php';
        echo '<script>location.href = "/";
        </script>';
    } else {
        $_SESSION['captcha_wrong'] = true;
        echo '<script>location.href = "/";
        </script>';
    }
}
?>