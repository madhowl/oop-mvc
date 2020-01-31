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
    }

    public function loadImage()
    {
        $row = $this->Model->getById (2);
        $url = $row['original_picture'];
        $path = $this->UploadDir . $row['id'].'.jpg';
        //S::dbg ($path);
        S::downloadFile ($url, $path);
    }
}