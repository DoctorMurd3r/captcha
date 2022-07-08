<?php session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='style.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous">
    </script>
    <title>Гостевая книга</title>
</head>
<body>
    <div class="container">
<h1>Гостевая книга</h1>

<?php 

?>
<div class="form">
    <form method="post" id="form" action='checkAndSend.php'>
        <input type="text" name="username" id="username" placeholder="Имя пользователя" size="30"><br>
        <input type="text" name="email" id="email" placeholder="E-mail" size="35"><br><br>
        
        <div>
        <img src="captcha.php" width="300" height="100" alt='captcha' style="border:1px solid black"><br>
        <p style="margin: 0;">Введите код с изображения</p>
        <input type="text" name="captcha" id="captcha" size="20">
        <?php 
        if($_SESSION['captcha_wrong']){
            unset($_SESSION['captcha_wrong']);
            echo '<p style="color:red;margin:0">Код был введен неверно</p><br><br>';
        }
        ?>
        </div>
        
        <textarea name="message" id="message" cols="35" rows="5" placeholder="Сообщение"></textarea><br>
        <button type="submit">Оставить запись в гостевой книге</button><br><br>    
        <?php 
    if($_SESSION['captcha_success']){
        unset($_SESSION['captcha_success']);
        echo '<h2 style="color:green">Запись была успешно добавлена</h2>';
    }
?>
    </form>
</div>

<script src="validation.js"></script>

<?php
    echo '<div class=\'sorts\'>';
    echo '<a href="?page=1&sort=username">Сортировка по имени пользователя</a>';
    echo '<a href="?page=1&sort=email">Сортировка по E-mail</a>';
    echo '<div><a href="?page=1&sort=datedesc">Сортировка по дате добавления (убыв)</a>&nbsp;&nbsp;&nbsp;';
    echo '<a href="?page=1&sort=dateasc">Сортировка по дате добавления (возр)</a></div>';
    echo '</div>';
    include_once 'db.php';
    $selectAll = 'SELECT id FROM records';
    $connPages = $conn->query($selectAll);
    $pages = $connPages->fetchAll();


    if(!$_GET['page']){
        $select = "SELECT * FROM records ORDER BY create_time DESC LIMIT 5";    
    } else {
        $pageLimit = (($_GET['page'] * 5) - 5) . ',5';
        if($_GET['sort']){
            if($_GET['sort'] == 'datedesc'){
                $orderby = 'create_time desc';
                $select = "SELECT * FROM records ORDER BY " . $orderby . " LIMIT $pageLimit";
            } elseif ($_GET['sort'] == 'dateasc') {
                $orderby = 'create_time asc';
                $select = "SELECT * FROM records ORDER BY " . $orderby . " LIMIT $pageLimit";
            } else {
            $select = "SELECT * FROM records ORDER BY " . $_GET['sort'] . " LIMIT $pageLimit";
            }
        } else {
            $select = "SELECT * FROM records ORDER BY create_time DESC LIMIT $pageLimit";
        }        
    }
    
    $conn = $conn->query($select);
    $results = $conn->fetchAll();
    
        if(count($results) != 0){
            echo '<div><table>';
            echo '<tr>
                    <th>Имя пользователя</th>
                    <th>E-mail</th>
                    <th>Сообщение</th>
                    <th>Время добавления</th>
                    <th>Браузер</th>
                </tr>';
            foreach($results as $record){
                echo '<tr>
                    <td>'. $record['username'] .'</td>
                    <td>'. $record['email'] .'</td>
                    <td>'. $record['message'] .'</td>
                    <td>'. $record['create_time'] .'</td>
                    <td>'. $record['client_browser_info'] .'</td>
                </tr>';
            }
            echo '</table></div>';
        } else {
            echo '<p>Нет записей</p>';
        }
        echo '<br>';
    $pages = ceil(count($pages) / 5);
    if($pages != 1){
        echo '<div class="pages">';
        if($_GET['sort']){
            for($i = 1; $i <= $pages; $i++){
                if($_GET['page'] == $i){
                    echo '<a href="?page='. $i .'?&sort='. $_GET['sort'] .'" style="color:red">'.$i.'</a>';
                } else {
                    echo '<a href="?page='. $i .'?&sort='. $_GET['sort'] .'">'.$i.'</a>';                    
                }
            }    
        } else {
            for($i = 1; $i <= $pages; $i++){
                if($_GET['page'] == $i){
                    echo '<a href="?page='. $i .'" style="color:red">'.$i.'</a>&nbsp;&nbsp;';    
                } elseif (!$_GET['page']){
                    if($i == 1){
                        echo '<a href="?page='. $i .'" style="color:red">'.$i.'</a>&nbsp;&nbsp;';
                    } else {
                        echo '<a href="?page='. $i .'">'.$i.'</a>&nbsp;&nbsp;';    
                    }
                } else {
                    echo '<a href="?page='. $i .'">'.$i.'</a>&nbsp;&nbsp;';
                }
            }
        }
        echo '</div>';
    }

?>
</div>
</body>
</html>
