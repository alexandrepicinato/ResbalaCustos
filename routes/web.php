<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
    //return view('welcome');
//    return view('welcome');
//});
Route::get ('/' , [\App\Http\Controllers\Scrapper::class , 'reactapp'])->name('LandPage');
Route::get ('/produto/{p1}' , [\App\Http\Controllers\Scrapper::class , 'reactapp'])->name('Vista do Produto');
Route::get ('/historico/{p1}/{p2}' , [\App\Http\Controllers\Scrapper::class , 'reactapp'])->name('Historico de Preços');
Route::get ('/buscar/{p1}' , [\App\Http\Controllers\Scrapper::class , 'reactapp'])->name('Busca');

//Route::get ('/busca/products/' , [\App\Http\Controllers\Scrapper::class , 'searsh'])->name('Searsh');
//Route::get ('/consultoria/products/{productid}' , [\App\Http\Controllers\Scrapper::class , 'prices'])->name('Scrapper');
//Route::get ('/consultoria/acompanhamento/{p1}/{p2}' , [\App\Http\Controllers\Scrapper::class , 'historyPrices'])->name('historico ');

