<?php


namespace App\blog;


use App\blog\PostsModel as Model;
use App\blog\PostsView as View;
use Core\ServiceController as S;

class PostsController
{
    public $Posts;
    public $Categories;
    public $View;

    public function __construct ()
    {
        $this->Posts = new Model('posts');
        $this->Categories = new Model('categories');
        $this->View = new View();
    }

    public function getAllPosts()
    {
        $postList = $this->Posts->all ();
        $categoriesList = $this->Categories->all ();
        $lastPost = $this->Posts->getLastPost ();
        //S::dbg ($this->Model->out);
        //S::dbg ($lastPost);
        $this->View->ShowAll($postList,$categoriesList, $lastPost);
    }

}