<?php
$users = "../pages/users.txt";


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
        // формируем строку с данными пользователя для записи в файл в формате  "username":"usermale@ibox.ru:":"password123"
        $line = $login. ":". $email.":".md5($pass)."\n\r";
        fputs($file, $line);
        fclose($file);
        return true;
    } 
}
?>

