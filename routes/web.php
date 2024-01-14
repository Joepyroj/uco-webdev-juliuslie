<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::prefix('/articles')->middleware('auth')->group(function () {
    Route::get('/', [ArticleController::class, 'list'])->name('article.list');
    Route::match(['get', 'post'], '/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/{slug}', [ArticleController::class, 'single'])->name('article.single');
    Route::match(['get', 'post'], '/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/{id}/delete', [ArticleController::class, 'delete'])->name('article.delete');
    Route::post('/{id}/comment', [ArticleController::class, 'comment'])->name('article.comment');
});

Route::prefix('/article_categories')->middleware('auth')->group(function () {
    Route::get('/', [ArticleCategoryController::class, 'index'])->name('article_category.list');
    Route::get('/create', [ArticleCategoryController::class, 'create'])->name('article_category.create');
    Route::post('/create', [ArticleCategoryController::class, 'store']);
    Route::get('/{id}/edit', [ArticleCategoryController::class, 'edit'])->name('article_category.edit');
    Route::post('/{id}/edit', [ArticleCategoryController::class, 'update']);
    Route::post('/{id}/delete', [ArticleCategoryController::class, 'destroy'])->name('article_category.delete');
});

Route::controller(\App\Http\Controllers\UserController::class)->middleware('auth')->group(function () {
    Route::get('/users', 'list')->name('user.list');
    Route::match(['get', 'post'], '/users/create', 'create')->name('user.create');
    Route::match(['get', 'post'], '/users/{id}/edit', 'edit')->name('user.edit');
    Route::post('/users/{id}/delete', 'delete')->name('user.delete');
});

Route::match(['get', 'post'], '/login', [\App\Http\Controllers\LoginController::class, 'form'])->middleware('guest')->name('login');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth')->name('logout');
