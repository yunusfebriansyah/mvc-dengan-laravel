<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Redirect routes
Route::redirect('/redirect', '/example', 301);

// View routes
Route::view('/example', 'example', [
    'title' => 'Example Page',
    'user' => [
        'name' => 'John',
        'email' => 'john@example.com'
    ]
]);

// Route parameters
Route::get('/user/{name}/{email?}', function (string $name, string $email = 'kosong') {
    return "User $name , $email";
});

// Route parameter patterns
Route::get('/post/{id}', function(string $id){
    return $id;
})->where('id', '[0-9]+');

// route named
Route::get('/register', function(){
    return 'register page';
})->name('register');

Route::get('/test', function(){
    // return redirect()->route('register');
    return to_route('register');
});