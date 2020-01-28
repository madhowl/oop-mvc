<?php

namespace App;

class View
{
    public $name;

    public function __construct ($view_name)
    {
        $this -> setName ($view_name);
    }

    public function getName ()
    {
        echo $this -> name.'<br>';
    }

    public function setName ($name)
    {
        $this -> name = $name;
    }
    public function showForm()
    {
        echo '<form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />    
        Отправить этот файл: <input name="image" type="file" />
        <input type="submit" value="Отправить файл" />
    </form>
';
    }
    public function allNews($data)
    {
        echo "<h1>".$data['title']."</h1>".$data['text'];
    }
    public function oneNews($data)
    {
        echo "<h1>".$data['title']."</h1>".$data['text'];
    }

}