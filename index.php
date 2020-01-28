<?php
require_once ('vendor/autoload.php');

use App\Controller ;
use App\ServiceController;

$tech =new ServiceController();
$c = new Controller();
//$tech->dbg($_SERVER);
//$tech->dbg($_SERVER['REQUEST_URI']);
switch ($_SERVER['REQUEST_URI']){
    case '/all':
        $c->allNews();
        break;
    case '/news/15':
        $c->singleNews (25);
        break;
    default:
        echo '<h1>!WTF! 404 ERROR !WTF!</h1><p>Страница не найдена - грусть печаль :(</p><p>  Ибо нефиг - может ты мамкин Хацкер </p>';
}

//$c->allNews ();
//$c->singleNews (25);

