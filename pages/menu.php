<?php
require'../pages/functions.php';
global $loginuser;

if(isset($_POST["logbtn"]) || $loginuser){
?>
<a class="nav-link text-white-50" href="index.php?page=1">Home</a>
<a class="nav-link text-white-50" href="index.php?page=2">Upload</a>
<a class="nav-link text-white-50" href="index.php?page=3">Gallery</a>
<a class="nav-link text-white-50" href="index.php?page=4">Registratoin</a>
<a type="submit" class="nav-link text-white-50" href="index.php?page=5">Login</a>
<a type="submit" class="nav-link text-white-50">Logout</a>
<?php
}
else{
?>
    <a class="nav-link text-white-50" href="index.php?page=3">Gallery</a>
    <a class="nav-link text-white-50" href="index.php?page=4">Registratoin</a>
    <a class="nav-link text-white-50" href="index.php?page=5">Login</a>
<?php
}
?>
