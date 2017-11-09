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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('foo', function(){
    return '[S=>1];';
});

$router->post('foo', function(){
    return "1231231231";
});


$router->get('user/{id}', function($id){
    return "user $id";
});

// notice  {params} != $params 那么function内部值按照URL倒序赋值
$router->get('post/{postid}/comment/{commentId}', function($postId, $commentId){
    return "$postId, $commentId";
});

// $router->get('user[/{name}]', function($name=null){
//     return $name;
// });

$router->get('user2/{name:[A-za-z]+}', function($name){
    return $name;
});

$router->get('profile', ['as'=>'profile1', function(){
    $url = route('profile1');
    var_dump($url);    
    // return redirect()->route('profile1');
}]);

$router->get('testprofile', function(){
    $url = route('profile1');
    var_dump($url);
    sleep(3);    
    return redirect()->route('profile1');
});


//middleware
// $router->group(['middleware'=>'auth'], function() use($router){
//     $router->get('auth', function(){
//         var_dump('use auth middleware');
//     });
// });

$router->group(['middleware'=>'example'], function() use($router){
    $router->get('example', function(){
        var_dump("use example middleware");
    });
});

$router->group(['middleware'=>'after'], function() use ($router)
{
    $router->get('after', function(){
        var_dump("run after middleware");
    });
});