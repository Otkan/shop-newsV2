<?php

use App\Http\Controllers\NewsController;
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

Route::redirect('/', '/news', 302)
    ->name('root');

Route::any('news', [NewsController::class, 'showList'])
    ->name('news');

Route::any('news-detail/{id}', [NewsController::class, 'showDetail'])
    ->name('news-detail');

Route::any('save-detail/{id}', [NewsController::class, 'saveDetail'])
    ->name('save-detail');

Route::any('show-create-news', [NewsController::class, 'showCreate'])
    ->name('show-create-news');

Route::any('create-news/{shop_id?}', [NewsController::class, 'create'])
    ->name('create-news');


