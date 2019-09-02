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

Route::get('/', 'Movies@ShowAllMovies');
Route::get('/fill', 'Movies@GetMoviesFromApi');
Route::get('/clear','Movies@ClearAllMovies');
Route::get('/testapi', function() {
   $data=\L5Imdb::title('0944947')->all();  // game of throne id
   return $data; 
});

