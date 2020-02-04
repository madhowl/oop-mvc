<?php


namespace App;



use Core\CoreModel;
use Core\ServiceController as S;

class ImportController
{
    protected $Model;
    protected $UploadDir;
    public function __construct ()
    {
        $this->Model = new CoreModel('books');
        $this->UploadDir = 'uploads/';
        S::dbg ($this->UploadDir);
    }

    public function loadImage($id)
    {
        $row = $this->Model->getById ($id);
        $url = $row['original_picture'];
        $path = $this->UploadDir . $row['id'].'.jpg';
        //S::dbg ($path);
        S::downloadFile ($url, $path);
        S::imageResize($path, $width=400);
        echo $row['id'].'.jpg - Ok<br>';
    }

    public function loadAllImageFromDB()
    {
        $list = $this->Model->all ();
        //S::dbg ($list);
        foreach ($list as $item)
        {
            $this->loadImage ($item['id']);
        }
    }
}