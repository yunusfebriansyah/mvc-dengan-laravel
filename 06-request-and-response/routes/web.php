<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// requests and responses

Route::get('/show-form', function(){
    return view('show-form');
})->namespace;

Route::get('/send-get', function(Request $request){
    dump($request->all());
});

Route::post('/send-post', function(Request $request){
    // seandainya sudah diterima dan diolah
    // dump($request->message);

    //response
    return redirect('/show-form')->with('message', $request->message);
});

Route::put('/send-put', function(Request $request){
    dump($request->all());
});

Route::delete('/send-delete', function(Request $request){
    if( $request->isMethod('delete') ){
        return 'betul sekali bahwa ini menerima method delete';
    }else{
        return redirect('/show-form');
    }
});

