<?php
require "../connection.php";

if(isset($_POST['login']) and isset($_POST['email']))
{
    $login = $_POST['login'];
    $email = $_POST['email'];

    $requery = 'SELECT * FROM clients WHERE login=:login and email=:email and activation=1';  
    $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array (':login' => $login, ':email' => $email));
    $row = $stmt->fetchAll();
    if(count($row) == 0)
    {
        $text = 'Пользователя с таким логином и email не сущетсвует';
        require 'errors.php';
        return;
    }
    else
    {
        $datenow = date('YmdHis');//извлекаем    дату 
        $new_password = hash('sha256', $datenow);// шифруем    дату
        $new_password = substr($new_password,    2, 10); //извлекаем из шифра 10 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.
        
        $requery = 'UPDATE clients SET password=:password WHERE login=:login'; // изменяем пароль на новый
        $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array (':password' => $new_password, ':login' => $login));
        
        $charset = "utf-8";
        $headerss ="Content-type: text/html; charset=$charset\r\n";
        $headerss.="MIME-Version: 1.0\r\n";
        $headerss.="Date: ".date('D, d M Y h:i:s O')."\r\n";
        $message = "Здравствуйте, ".$login."! Мы сгененриоровали для Вас пароль, теперь Вы сможете войти на сайт test.ru, используя его. Пароль:\n".$new_password;
        mail($email, 'Восстановление пароля', $message, $headerss);

        header("Location: entry.php");
    }

}
else
{
    $text = 'Вы не ввели логин или email';
    require 'errors.php';
    return;
}