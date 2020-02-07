<?php


namespace App\blog;


use App\blog\PostsModel as Model;
use App\blog\PostsView as View;
use Core\ServiceController as s;

class PostsController
{
    public $Model;
    public $View;

    public function __construct ()
    {
        $this->Model = new Model('posts');
        $this->View = new View();
    }

    public function getAllPosts()
    {
        $this->Model->all ();
        //S::dbg ($this->Model->out);
        $this->View->ShowAll($this->Model->out);
    }

}