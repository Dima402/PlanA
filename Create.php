<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<link href="style.css" media="screen" rel="stylesheet">
<body>
<?php
require_once 'connection.php'; 
 
if(isset($_POST['name']) && isset($_POST['company'])){
 
    $name = htmlentities(mysqli_real_escape_string($con, $_POST['name']));
    $company = htmlentities(mysqli_real_escape_string($con, $_POST['company']));
     
    $query ="INSERT INTO tovars VALUES(NULL, '$name','$company')";
     
    $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 
    if($result)
    {
		$message = "Данные добавлены";
		echo "<p class='error'>" . "СООБЩЕНИЕ: ". $message . "</p>";
    }
    mysqli_close($con);
}
?>
<div class='container'>
	<h2>Добавить новую модель</h2>
	<form method="POST">
	<p>Введите модель:<br> 
	<input type="text" name="name" required /></p>
	<p>Производитель: <br> 
	<input type="text" name="company" required /></p>
	<input type="submit" value="Добавить">
	<a href='Userpage.php'><input type="button" value="Назад"></a>
	</form>
</div>
</body>
</html>