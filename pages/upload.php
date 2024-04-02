<h1>Upload form</h1>

<?php
if(!isset($_POST["uploadbtn"])){
?>
<form action="index.php?page=2" method="post" enctype="multipart/form-data">
    <div class="form-group my-2">
        <label for="myfile" class="form-label">chose files for upload</label>
        <input type="file" name="myfile" id="myfile" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-outline-primary my-2" name="uploadbtn">upload</button>

</form>
<?php
} 
else {
    //если статус завершения загрузки не 0, т.е. какая-либо ошибка(коды от 1 до 4)
    //upload_max_filesize = 40M  // php.ini
    if($_FILES["myfile"]["error"] != 0) {
        echo "<h3 class='text-danger text-center'>Ошибка загрузки файла: " .$_FILES["myfile"]["error"]. "</h3>";
        exit();
    }
    //проверяем, был ли загружен файл с временным именем во временную директорию
    if(is_uploaded_file($_FILES["myfile"]["tmp_name"])) {
        //перемещаем из временной директории в нужную нам под оригинальным именем
        move_uploaded_file($_FILES["myfile"]["tmp_name"], "../images/".$_FILES["myfile"]["name"]); 
        echo "<h3 class='text-success text-center'>Файл успешно загружен!</h3>";        
        exit();
    }
    echo "<h3 class='text-danger text-center'>Ошибка загрузки файла: " .$_FILES["myfile"]["error"]. "</h3>";
}

?>