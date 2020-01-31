<?php
session_start();
require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;


Macaw::get('/', function() {
    echo 'Hello world!';
});
Macaw::get('/about', function() {
    echo 'ЭТО страница About !';
});

Macaw::get('news/', 'App\Controller@allNews');
Macaw::get('import/', 'App\ImportController@loadImage');
Macaw::get('news/(:num)', 'App\Controller@singleNews');
Macaw::get('all', 'Core\CoreController@all');
Macaw::get('count', 'Core\CoreController@count');

Macaw::dispatch();
