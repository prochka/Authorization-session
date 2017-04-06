<?php
session_start();

if($_SESSION['admin']){
	header("Location: admin.php");
	exit;
}

$salt = 'qw';
$admin = 'admin';
$pass = 'qwLF6kI8APmyI'; //кэш зашифровываем так: crypt('name_password', $salt); или на сервисе: https://ru.functions-online.com/crypt.html

if($_POST['submit']){
	if($admin == $_POST['user'] AND $pass == crypt($_POST['pass'], $salt)){
		$_SESSION['admin'] = $admin;
		header("Location: admin.php");
		exit;
	}else echo '<p>Логин или пароль неверны!</p>';
}
?>
<p><a href="index.php">Главная</a> | <a href="contact.php">Контакты</a> | <a href="admin.php">Админка</a></p>
<hr />
Это страница авторизации.
<br />
<form method="post">
	Username: <input type="text" name="user" /><br />
	Password: <input type="password" name="pass" /><br />
	<input type="submit" name="submit" value="Войти" />
</form>