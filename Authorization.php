<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php 
require_once("connection.php"); 
?>	 
<?php	
if(isset($_SESSION["session_username"]))
{
	header("Location: Userpage.php");
}

if(isset($_POST["login"]))
{
	if(!empty($_POST['username']) && !empty($_POST['password'])) 
	{
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		
		$query=mysqli_query($con, "SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
		
		$numrows=mysqli_num_rows($query);
		
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
			}
			if($username == $dbusername && $password == $dbpassword)
			{
				$_SESSION['session_username']=$username;	 
				header("Location: Userpage.php");
			}
		} 
		else 
		{

			$message = "Неверное имя пользователя или пароль!";
		}
	} 
	else 
	{
		$message = "Все поля пустые!";
	}
}
if (!empty($message)) {echo "<p class='error'>" . "СООБЩЕНИЕ: ". $message . "</p>";} 
?>
<link href="style.css" media="screen" rel="stylesheet">
<body>
	<div class="container mlogin">
		<div id="login">
			<h1>Вход</h1>
			<form action="" id="loginform" method="post" name="loginform">
				<p><label for="user_login">Имя опльзователя<br>
				<input class="input" id="username" name="username" size="20" type="text" value="" required></label></p>
				<p><label for="user_pass">Пароль<br>
				<input class="input" id="password" name="password" size="20" type="password" value="" required></label></p> 
				<p class="submit"><input class="button" name="login" type="submit" value="Войти"></p>
				<p class="regtext">Еще не зарегистрированы?<a href= "Registration.php">Регистрация</a>!</p>
			</form>
		</div>
	</div>
</body>