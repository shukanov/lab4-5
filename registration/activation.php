<?php
require "../connection.php";

if(isset($_GET['code']))
{
    $code = $_GET['code'];
    $login = $_GET['login'];

    $requery = 'SELECT * FROM clients WHERE login=:login';  
    $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array (':login' => $login));
    $row = $stmt->fetchAll();
    // создаем таким же способом код активации
    $sha256_login = hash('sha256', $row[0]['login']);
    $sha256_id = hash('sha256', $row[0]['id']);
    $activation = $sha256_login . $sha256_id;

    if($activation == $code)
    {
        // изменяем код активации на 1
        $requery = 'UPDATE clients SET activation=1 WHERE login=:login';
        $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array (':login' => $login));
        header("Location: entry.php");
    }
    else
    {
        $text = 'Ошибка! Ваш Е-мейл не подтвержден!';
        require 'errors.php';
        return;
    }
}
else
{
    $text = 'Вы зашли на страницу без кода подтверждения';
    require 'errors.php';
    return;
}



