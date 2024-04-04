<h1>Gallery</h1>
 
<form action="index.php?page=3" method="post" class="my-4">
    <div class="form-group my-2">
        <label for="ext" class="form-label">Выберите тип изображения: </label>
        <select name="image_ext" id="ext" class="form-select">
            <option disabled selected>Выберите расширение файла...</option>
            <?php
            $path = "../images/";
            //открытие директории, возврат указателя на директорию
            if ($dir = opendir($path)) {
                $ar = array(); //массив для записи расширений
                //считывание информации о файлах из директории
                while (($file = readdir($dir)) !== false) {
                    $fullname = $path . $file;
                    //поиск подстроки с конца строки
                    $pos = strrpos($fullname, ".");
                    //извлекаем расширение изображения
                    $ext = substr($fullname, $pos + 1);
                    $ext = strtolower($ext);
                    if (!in_array($ext, $ar) && $ext != "") {
                        $ar[] = $ext;
                        echo "<option>$ext</option>";
                    }
                }
                closedir($dir);
            }
            ?>
        </select>
        <input type="submit" class="btn btn-outline-primary mt-3" name="submit" value="Показать изображения">
    </div>
</form>

<?php
if(isset($_POST["submit"])) {
    $ext = $_POST["image_ext"];
    //формирование массива файлов в соответствии с указанным паттерном(любое имя файла и выбранное в селекте расширение)
    $ar = glob($path . "*." .$ext);
    echo "<div class='my-3 d-flex justify-content-between gap-3 flex-wrap'>";
    foreach($ar as $a) {
        echo "<a href='$a' target='_blank'><img src='$a' height='100px' width='100px' alt='picture' class='img rounded-3'></a>";
    }
    echo "</div>";
}
?>