<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<link href="style.css" media="screen" rel="stylesheet">
<body>
<?php
require_once 'connection.php'; 


if(isset($_POST['name']) && isset($_POST['company']) && isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($con, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($con, $_POST['name']));
    $company = htmlentities(mysqli_real_escape_string($con, $_POST['company']));
     
    $query ="UPDATE tovars SET name='$name', company='$company' WHERE id='$id'";
    $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 
 
    if($result)
    {
		$message = "Данные обновлены";
		echo "<p class='error'>" . "СООБЩЕНИЕ: ". $message . "</p>";
	}
}
 

if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($con, $_GET['id']));
     

    $query ="SELECT * FROM tovars WHERE id = '$id'";

    $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 

    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result);
        $name = $row[1];
        $company = $row[2];
         
        echo "<div class='container'><h2>Изменить модель</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите модель:<br> 
            <input type='text' name='name' value='$name' /></p>
            <p>Производитель: <br> 
            <input type='text' name='company' value='$company' /></p>
            <input type='submit' value='Сохранить'>
			<a href='Userpage.php'><input type='button' value='Назад'></a>
            </form></div>";
         
        mysqli_free_result($result);
    }
}

mysqli_close($con);
?>
</body>
</html>