<?php
session_start();
require "../connection.php";

$login = $_POST['login'];
$password = $_POST['password'];
if($login == NULL || $password == NULL)
{
    $text = 'Вы не ввели все данные';	
    require 'errors.php';
    return;
}
else
{
    $login = stripcslashes($login);  //обработка логина
    $login = htmlspecialchars($login, ENT_QUOTES);
    $login = trim($login); // удаление пробелов

    $password = stripcslashes($password);  //обработка логина
    $password = htmlspecialchars($password, ENT_QUOTES);
    $password = trim($password); // удаление пробелов

    $requery = 'SELECT * FROM clients WHERE login=:login';  
    $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array (':login' => $login));
    $row = $stmt->fetchAll();
        if(count($row) == 0)
        {
            $text = 'Логин неверный';
            require 'errors.php';
            return;
        }
        else
        {
            if($row[0]['password'] == $password)
            {
                if($row[0]['activation'] == 1)
                {
                    $_SESSION['login'] = $row[0]['login'];
                    $_SESSION['id'] = $row[0]['id'];
                    header("Location: ../index.php");
                }
                else
                {
                    $text = "Аккаунт не активирован";
                    require 'errors.php';
                    return;
                }
            }
            else
            {
                $text = "Пароль неверный";
                require 'errors.php';
                return;
            }
        }
}
