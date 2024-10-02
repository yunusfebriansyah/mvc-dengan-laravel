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

Route::get('/view', function() {
    return view('views-management',
        [
            'nama' => 'Fahri Husein',
            'anggota' => [
                [
                    'nama' => 'Andi',
                    'jk' => 'Laki-laki',
                    'umur' => 25,
                ],
                [
                    'nama' => 'Mawar',
                    'jk' => 'Perempuan',
                    'umur' => 21,
                ],
            ]
        ]);
});
