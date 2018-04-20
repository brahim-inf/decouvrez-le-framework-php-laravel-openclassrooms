<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('1', function() { return 'Je suis la page 1 !'; });
Route::get('2', function() { return 'Je suis la page 2 !'; });
Route::get('3', function() { return 'Je suis la page 3 !'; });

Route::get('{n}', function($n) {
	return 'Je suis la page ' . $n . ' !'; 
});
Route::get('/', ['as' => 'home', function()
{
  return 'Je suis la page d\'accueil !';
}]);
Route::get('{n}', function($n) { 
    return response('Je suis la page  numero' . $n . ' !', 200);
})->where('n', '[1-3]');
Route::get('/', function(){
	return view('vue1');
});
Route::get('article/{n}', function($n)
{
	// return view('article')->with('numero', $n); //method 1
	// return view('article')->withNumero($n);//method 2
	return view('article', ['numero' => $n]);//method 3
})->where('n', '[0-9]+');

Route::get('facture/{n}', function($n){
	return view('facture')->withNumero($n);
})->where('n', '[0-9]+');

Route::get('/', 'WelcomeController@index');
Route::get('/article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

// Routes pour les formulaires
Route::get('users','UserController@getInfos');
Route::post('users', 'UserController@postInfos');

//Routes pour le formulaire contact
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

//route pour uploader les images
Route::get('image', 'ImageController@getForm');
Route::post('image', 'ImageController@postForm');

//route pour les email
Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm','as' => 'storeEmail']);