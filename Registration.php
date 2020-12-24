<!DOCTYPE html>
<html lang="en">
<?php require_once("connection.php"); ?>
<?php

if(isset($_POST["register"]))
{
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) 
	{
		$full_name= htmlspecialchars($_POST['full_name']);
		$email=htmlspecialchars($_POST['email']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		
		$query=mysqli_query($con, "SELECT * FROM usertbl WHERE username='".$username."'");
		
		$numrows=mysqli_num_rows($query);
		
		if($numrows==0)
		{
			$sql="INSERT INTO usertbl (full_name, email, username,password) VALUES('$full_name','$email', '$username', '$password')";
			
			$result=mysqli_query($con, $sql);
			
			if($result)
			{
				$message = "Аккаунт успешно создан";
			} 
			else 
			{
				$message = "Ошибка сохранения данных!";
			}
		} 
		else 
		{
			$message = "Пользователь с таким логином уже существует, попробуйте другой!";
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
	<div class="container">
		<div id="login">
			<h1>Регистрация</h1>
			<form action="Registration.php" id="registerform" method="post"name="registerform">
				<p><label for="user_login">Полное имя<br>
				<input class="input" id="full_name" name="full_name" size="32"  type="text" value="" required></label></p>
				<p><label for="user_pass">E-mail<br>
				<input class="input" id="email" name="email" size="32" type="email" value="" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" required></label></p>
				<p><label for="user_pass">Имя пользователя<br>
				<input class="input" id="username" name="username" size="32" type="text" value="" required></label></p>
				<p><label for="user_pass">Пароль<br>
				<input class="input" id="password" name="password" size="32" type="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Пароль должен содержать как мниимум 8 символов, цифры, строчные и прописные буквы' : ''); if(this.checkValidity()) form.psw1.pattern = this.value;" required></label></p>
				<p><label for="user_pass">Повтор пароля<br>
				<input class="input" id="password1" name="password" size="32" type="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Пароли не совпадают' : '');" required></label></p>
				<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
				<p class="regtext">Уже зарегистрированы? <a href= "Authorization.php">Введите имя пользователя</a>!</p>
			 </form>
		</div>
	</div>
</body>