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

Route::get('/', 'WelcomeController@welcome')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/geo', 'geobg@geo')->name('geo');
Route::get('/hydro', 'geobg@hydro')->name('hydro');

Route::get('/file', function () {
    return view('fileupload');
})->name('file');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
//Crud routes for news
Route::resource('news','NewsController')->middleware('IsAdmin');

Route::get('/admin', function () {
    return view('admin.home');
})->name('admin.home')->middleware('IsAdmin');

Route::post('/showArticle', 'NewsController@showArticle')->name('showArticle');


Route::get('/ip', function () {
    return view('admin.ip');
})->middleware('IsAdmin');


//Show Ip routes
Route::post('/Ipdays','IpController@show_ip')->name('Ipdays')->middleware('IsAdmin');
Route::post('/Iphours','IpController@show_ip_hours')->name('Iphours')->middleware('IsAdmin');

Route::post('/LatLon','IpController@LatLon')->name('LatLon')->middleware('IsAdmin');
