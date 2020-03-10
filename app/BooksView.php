<?php


namespace App;


use Core\CoreView;

class BooksView extends CoreView
{
    public  function bookList($books,$title)
    {
        include ('template/booklist.php');
    }

    public function readBook($book)
    {
        echo $this->twig->render('/book/read.twig',['book' => $book]);
    }
}