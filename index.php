<?php
require_once ('vendor/autoload.php');

//use App\Controller ;
//use App\ServiceController;
use \NoahBuscher\Macaw\Macaw;


Macaw::get('/', function() {
    echo 'Hello world!';
});
Macaw::get('/about', function() {
    echo 'ЭТО страница About !';
});

Macaw::get('news/', 'App\Controller@allNews');
Macaw::get('news/(:num)', 'App\Controller@singleNews');

Macaw::dispatch();
