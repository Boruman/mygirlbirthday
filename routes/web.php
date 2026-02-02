<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/countdown'));

Route::get('/countdown', fn() => view('countdown'));
Route::get('/surprise', fn() => view('surprise'));
