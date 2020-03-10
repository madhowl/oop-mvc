<?php


namespace App;


use Core\CoreModel;
use Core\ServiceController as S;

class BooksController
{
    public $Model;
    public $View;
    public $content;


    public function __construct ()
    {
        $this->Model = new CoreModel('books');
        $this->View = new BooksView();

    }

    public function showBookListPerPage($curentPage)
    {
        $this->content =$this->Model->pagination ($curentPage);
        //S::dbg ($this->content);
        $this->View->bookList ($this->Model->out,$title =8778);
    }

    public function readBook($id)
    {
        $book = $this->Model->getById($id);
        $this->View->readBook($book);
    }
}