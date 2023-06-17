<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get ('/consultoria/produto/{productid}' , [\App\Http\Controllers\Scrapper::class , 'apiData'])->name('Scrapper');
Route::get ('/consultoria/acompanhamento/{p1}/{p2}' , [\App\Http\Controllers\Scrapper::class , 'apihistoryPrices'])->name('historico ');
Route::get ('/consultoria/newLog/{productid}' , [\App\Http\Controllers\Scrapper::class , 'apiprices'])->name('Scrapper');
Route::get ('/busca/produto/{p1}' , [\App\Http\Controllers\Scrapper::class , 'searshapi'])->name('Searsh');
Route::get ('/productslist/' , [\App\Http\Controllers\Scrapper::class , 'indexapi'])->name('LandPage');
