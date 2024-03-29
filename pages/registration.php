<h1 class="text-center mb-4">Registration Form</h1>

<?php

// если в массиве post не содержится ключ regbtn (если не нажата кнопка зарегистрироваться)
if(!isset($_POST["regbtn"])) {
    ?>
     
    <form action="index.php?page=4" method="post">
        <div class="form-group my-2">
            <label for="login" class="form-label">Login: </label>
            <input type="text" name="login" id="login" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="password1" class="form-label">Password: </label>
            <input type="password" name="password1" id="password1" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="password2" class="form-label">Confirm Password: </label>
            <input type="password" name="password2" id="password2" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary my-2" name="regbtn">Зарегистрироваться</button>
    </form>
     
    <a href="index.php?page=5" class="nav-link text-center my-3">Есть учетная запись? Войти</a>

    <?php
    }
    else {
       
    }
    ?>