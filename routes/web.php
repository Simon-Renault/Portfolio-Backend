<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Http\Controller\AuthController;
use App\Http\Controller\PageController;



$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        


        $router->get('/key', function() {
            return str_random(32);
        });


        $router->post('pages', ['uses' => 'PageController@create']);

        $router->delete('pages/{id}', ['uses' => 'PageController@delete']);

        $router->put('pages/{id}', ['uses' => 'PageController@update']);

    
    }
);


/*
 *
 *  Page resouce routes
 *
*/

$router->get('pages',  ['uses' => 'PageController@showAllPages']);

$router->get('pages/{id}', ['uses' => 'PageController@showOnePage']);


/*
 *
 *  cetrgories resouce routes
 *
*/
/*
$router->get('categories',  ['uses' => 'categorieController@showAllcategories']);

$router->get('categories/{id}', ['uses' => 'categorieController@showOnecategorie']);

$router->post('categories', ['uses' => 'categorieController@create']);

$router->delete('categories/{id}', ['uses' => 'categorieController@delete']);

$router->put('categories/{id}', ['uses' => 'categorieController@update']);
*/

/*
 *
 *  Login / logout routes
 *
*/
$router->post('auth/login', ['uses' => 'AuthController@authenticate']);
    