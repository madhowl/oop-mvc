<?php


namespace App\blog;


use Core\CoreView;
use Core\ServiceController;

class PostsView extends CoreView
{
    public function showAll($posts, $categories, $lastPost)
    {

        echo $this->twig->render ('blog/posts.twig',['posts'=>$posts,'categories'=>$categories, 'lastpost'=>$lastPost]);
    }
}