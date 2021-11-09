<?php

use App\Controllers\PathhController;

$pathh = new PathhController(
    //new \App\Models\Pathh(new \App\Database\Connection())
);


$router->get( API.'pathh', function (PathhController $pathh ){
    $pathh->index();
});


$router->get( API.'pathh/{id}', function ($id, PathhController $pathh ){
    $pathh->single($id);
});


$router->post( API.'pathh', function ( PathhController $pathh ){
    $pathh->store();
});


$router->patch( API.'pathh/{id}', function ($id, PathhController $pathh ){
    $pathh->update($id);
});


$router->delete( API.'pathh/{id}', function ($id, PathhController $pathh ){
    $pathh->erase($id);
});

