<?php
function dd($str){
    echo '<pre>';
    print_r($str);
    echo '</pre><br>';
}
function uploadImage(){
    if(isset($_FILES) && $_FILES['image']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
        $name = $_FILES['image']['name'];//Берём имя файла
        $tmp_name = $_FILES['image']['tmp_name'];//Временное имя файла
        $destiation_dir = dirname(__FILE__) .'\\uploads\\';// Директория для размещения файла
        move_uploaded_file($tmp_name, $destiation_dir . $name ); // Перемещаем файл в желаемую директорию
        echo 'File Uploaded'; // Оповещаем пользователя об успешной загрузке файла
    }
    else{
        echo 'No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
    }
}

uploadImage();
?>