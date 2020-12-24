<?php
require_once 'connection.php'; 
 
$query ="INSERT INTO tovars VALUES(NULL, 'iPhone5','Apple')";
$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    echo "Создание таблицы прошло успешно";
}

mysqli_close($con);
?>