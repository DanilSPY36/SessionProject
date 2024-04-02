<h1>Login page</h1>


<?php
// если в массиве post не содержится ключ regbtn (если не нажата кнопка зарегистрироваться)
if(!isset($_POST["regbtn"])) {
?>
    <form action="index.php?page=5" method="post">
        <div class="form-group my-2">
            <label for="login" class="form-label">Login or Email: </label>
            <input type="text" name="login" id="login" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="password1" class="form-label">Password: </label>
            <input type="password" name="password1" id="password1" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary my-2" name="regbtn">Login</button>
    </form>
     
    <a href="index.php?page=4" class="nav-link text-center my-3">Нет учетной записи? Зарегистрироваться</a>

    <?php
    }
    else 
    {
        if(login($_POST["login"], $_POST["password1"])) 
        {
            echo "<h3 class='text-success text-center'>Login success</h3>";
        }
    }
    ?>