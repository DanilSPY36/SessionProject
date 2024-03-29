<?php
session_start();


echo "<p>ID session: ". session_id(). "</p>";
echo "<p>number from session_2: " .$_SESSION["num"]. "</p>";

//$_COOKIE;// массив хранящий куки 
//setcookie("key", "value"); // установка куки
?>

<a href="session_1.php">Back</a>