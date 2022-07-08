<?php
    $server = 'whiterabbit';
    $username = 'root';
    $password = 'root';
    $db = 'db_whiterabbit';

    $conn = new PDO("mysql:host=$server;dbname=$db", $username,$password); //подключение к БД mysql
    //создание таблицы для записей. Предварительно уже должна быть создана база данных db_whiterabbit
    $sql = "CREATE TABLE IF NOT EXISTS records (id integer auto_increment primary key, username varchar(200), email varchar(200), message text, client_ip varchar(50), client_browser_info text, create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
    $conn->exec($sql);

?>