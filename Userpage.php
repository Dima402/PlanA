<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<link href="style.css" media="screen" rel="stylesheet">
<body>

<?php
session_start();
if(!isset($_SESSION["session_username"])):
header("location:Authorization.php");
else:
?>

<div class='container'>
<h2>Добро пожаловать, 
<span>
	<?php 

		echo $_SESSION['session_username'];
	?>
</span></h2>
<p><a href="Exit.php">Выйти</a> из системы</p>
<?php
require_once 'connection.php';
 
$query ="SELECT * FROM tovars";
 
$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 
if($result)
{
    $rows = mysqli_num_rows($result);
     
    echo "<table><tr><th>Id</th><th>Модель</th><th>Производитель</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    mysqli_free_result($result);
}
 
mysqli_close($con);
?>
<a href='Create.php'><input type='button' value='Добавление'></a>
<a href='Update.php'><input type='button' value='Редактирование'></a>	
<a href='Delete.php'><input type='button' value='Удаление'></a>		
</div>
</body>
</html>
<?php endif; ?>