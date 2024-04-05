<a class="nav-link text-white-50" href="index.php?page=1">Home</a>
<a class="nav-link text-white-50" href="index.php?page=4">Registratoin</a>
<a type="submit" class="nav-link text-white-50" href="index.php?page=5">Login</a>


<?php
if(isset($_SESSION["user"]))
{
?>
<a class="nav-link text-white-50" href="index.php?page=2">Upload</a>
<a class="nav-link text-white-50" href="index.php?page=3">Gallery</a>
<?php
}


if (isset($_SESSION["user"])) {
    echo "<form class='d-flex ms-auto' action='index.php";
    if (isset($_GET["page"])) echo "?page=" . $_GET["page"];
    echo "' method='post'>";
    echo "<a class='nav-link text-light fw-bold'>Привет, " . $_SESSION["user"] . "</a>";
    echo "<button type='submit' class='btn btn-outline-danger ms-2' name='exit'>Выйти</button>";
    echo "</form>";
}
if (isset($_POST["exit"])) {
    unset($_SESSION["user"]);   
    echo "<script>window.location = 'index.php?page=5'</script>";
}
?>