<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<link href="style.css" media="screen" rel="stylesheet">
<body>
<?php
require_once 'connection.php';
     
if(isset($_POST['id'])){
 
    $id = mysqli_real_escape_string($con, $_POST['id']);
     
    $query ="DELETE FROM tovars WHERE id = '$id'";
    $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 
 
	if($result)
    {
		$message = "Данные удалены";
		echo "<p class='error'>" . "СООБЩЕНИЕ: ". $message . "</p>";
	}
 
    mysqli_close($con);
}
 
if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    echo "<div class='container'><h2>Удалить модель?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
		<a href='Userpage.php'><input type='button' value='Назад'></a>
        </form></div>";
}
?>
</body>
</html>