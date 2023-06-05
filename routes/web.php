<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/login', function () {
    Auth::login(User::first());
});

Route::any('/debug/eval', function () {
    user()->should_debug_eval_allowed();
    return laravel_debug_eval();
});
