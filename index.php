<?php
session_start();
@define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)));
require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;
use DebugBar\StandardDebugBar;

//$debugbar = new StandardDebugBar();
//$debugbarRenderer = $debugbar->getJavascriptRenderer();
//$debugbar["messages"]->addMessage("hello world!");


Macaw::get('/', function() {
    //echo 'Hello world!';
    include ('template/import.html');
});
Macaw::get('/about', function() {
    phpinfo ();
});

Macaw::get('news/', 'App\Controller@allNews');


Macaw::get('blog/', 'App\blog\PostsController@getAllPosts');

Macaw::get('books/(:num)', 'App\BooksController@showBookListPerPage');

Macaw::get('import/', 'App\ImportController@loadImage');
Macaw::get('import/all', 'App\ImportController@loadAllImageFromDB');
Macaw::get('import/list', 'App\ImportController@getListImageFromDB');



Macaw::get('news/(:num)', 'App\Controller@singleNews');
Macaw::get('all', 'Core\CoreController@all');
Macaw::get('count', 'Core\CoreController@count');

Macaw::dispatch();
