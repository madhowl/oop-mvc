<?php
session_start();
require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;
use DebugBar\StandardDebugBar;

//$debugbar = new StandardDebugBar();
//$debugbarRenderer = $debugbar->getJavascriptRenderer();
//$debugbar["messages"]->addMessage("hello world!");


Macaw::get('/', function() {
    //echo 'Hello world!';
    include ('template/debug.php');
});
Macaw::get('/about', function() {
    phpinfo ();
});

Macaw::get('news/', 'App\Controller@allNews');

Macaw::get('books/(:num)', 'App\BooksController@showBookListPerPage');

Macaw::get('import/', 'App\ImportController@loadImage');
Macaw::get('import/all', 'App\ImportController@loadAllImageFromDB');
Macaw::get('news/(:num)', 'App\Controller@singleNews');
Macaw::get('all', 'Core\CoreController@all');
Macaw::get('count', 'Core\CoreController@count');

Macaw::dispatch();
