<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Post\Index;
use App\Livewire\Posts\Create;

Route::get('/', function () {
    return view('welcome');


});

Route::get('/counter', Counter::class);
Route::get('/', Index::class)->name('posts.index');
Route::get('/create', App\Livewire\Posts\Create::class)->name('posts.create');
Route::get('/edit/{id}', App\Livewire\Posts\Edit::class)->name('posts.edit');

