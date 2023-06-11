<?php

use App\Helpers\Classes\JavaScriptVars;
use App\Http\Controllers\ArticlesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use function vbarbarosh\laravel_debug_eval;

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

Route::get('/', fn () => view('welcome'));
Route::get('/dashboard', fn () => view('welcome'));
Route::get('/dashboard/new', fn () => view('welcome'));
Route::get('/dashboard/{article_uid}', fn () => view('welcome'));
Route::get('/dashboard/{article_uid}/delete', fn () => view('welcome'));

Route::any('/login', function () {
    Auth::login(User::first());
});

Route::any('/debug/eval', function () {
    user()->should_debug_eval_allowed();
    return laravel_debug_eval();
});

// /api/v1/articles
Route::get('/api/v1/articles.json', [ArticlesController::class, 'list']);
Route::get('/api/v1/articles-published.json', [ArticlesController::class, 'list_published']);
Route::get('/api/v1/articles/{article_uid}.json', [ArticlesController::class, 'fetch']);
Route::post('/api/v1/articles', [ArticlesController::class, 'create']);
Route::patch('/api/v1/articles/{article_uid}', [ArticlesController::class, 'update']);
Route::delete('/api/v1/articles/{article_uid}', [ArticlesController::class, 'remove']);
