<?php
$users = "../pages/users.txt";
$loginuser = false;

function register($login, $email, $pass){
    $login= trim(htmlspecialchars($login));
    $email= trim(htmlspecialchars($email));
    $pass= trim(htmlspecialchars($pass));

    if($login == "" || $email == "" || $pass == ""){
        echo "<h3 class='text-danger text-center'> Какое-то поле не заполнено!</h3>";
        return false;
    }
    if(strlen($login) < 3 || strlen($login) > 30)
    {
        echo "<h3 class='text-danger text-center'> Длинна логина должна быть от 3 до 30 символов </h3>";
        return false;
    }
    if(strlen($pass) < 8 || strlen($pass) > 30)
    {
        echo "<h3 class='text-danger text-center'> Длинна пароля должна быть от 8 до 30 символов </h3>";
        return false;
    }
    
    global $users;
    $file = fopen($users, 'a+'); // открываем файл в режиме чтения и записи, если файла нет создаем
    while($line = fgets($file, 128))
    {
        $readname = substr($line, 0, strpos($line, ":"));
        if($readname == $login){
            echo "<h3 class='text-danger text-center'> Данное имя занято </h3>";
            return false;
        }
    } 
    // формируем строку с данными пользователя для записи в файл в формате  "username":"usermale@ibox.ru:":"password123"
    $line = $login. ":". $email.":".md5($pass)."\n\r";
    fputs($file, $line);
    fclose($file);
    return true;
}

function logOut(){
    global $loginuser;
    $loginuser = false;
}

function login($loginOrEmail, $pass){
    $loginOrEmail= trim(htmlspecialchars($loginOrEmail));
    $pass= trim(htmlspecialchars($pass));
    $flag = false;
    if($loginOrEmail == "" || $pass == ""){
        echo "<h3 class='text-danger text-center'> Какое-то поле не заполнено!</h3>";
        return false;
    }
    global $users;
    $file = fopen($users, 'r');
    while($line=fgets($file, 128))
    {
        list($savedLogin, $savedEmail, $hash) = explode(':', $line);
        echo "".$savedLogin. "==" .$loginOrEmail. " || " .$savedEmail. "==" .$loginOrEmail. " || " .md5($pass). "==" .$hash."</br>";
        // Проверяем совпадение логина и пароля md5(trim($pass)
        if((trim($savedLogin) == trim($loginOrEmail) || trim($savedEmail) == trim($loginOrEmail)) && md5(trim($pass) == trim($hash))) 
        {
            echo 'Вход выполнен успешно!';
            fclose($file);
            global $loginuser;
            $loginuser = true;
            return true;
        }
    }
    fclose($file);
    return false;
}
function chekLogin(){
    global $loginuser;
    if($loginuser)
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>