<?php


namespace App;


class BooksView
{
    public  function bookList($books,$title)
    {
        include ('template/booklist.php');
    }
}