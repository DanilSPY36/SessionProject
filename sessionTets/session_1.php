<?php

session_start(); // открваем сессию если уже есть сессия и мы а дальнейшем можем ее использовать 
echo "<p>ID session: ". session_id(). "</p>";
$num = 1111;
$_SESSION["num"] = $num;
echo "<p>number from session_1: " .$_SESSION["num"]. "</p>";
?>

<a href="session_2.php">Forward</a>