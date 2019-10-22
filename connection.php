<?php 
	$dsn = 'mysql:dbname=test;host=127.0.0.1';
	$user = 'root';
	$password = '';

	try {
		$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo 'Подключение не удалось: ' . $e->getMessage();
	}
?>