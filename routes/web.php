<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/articles')->group(function () {
    Route::get('/', [ArticleController::class, 'list'])->name('article.list');
    Route::match(['get', 'post'], '/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/{slug}', [ArticleController::class, 'single'])->name('article.single');
    Route::match(['get', 'post'], '/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/{id}/delete', [ArticleController::class, 'delete'])->name('article.delete');
    Route::post('/{id}/comment', [ArticleController::class, 'comment'])->name('article.comment');
});

Route::prefix('/article_categories')->group(function () {
    Route::get('/', [ArticleCategoryController::class, 'index'])->name('article_category.list');
    Route::get('/create', [ArticleCategoryController::class, 'create'])->name('article_category.create');
    Route::post('/create', [ArticleCategoryController::class, 'store']);
    Route::get('/{id}/edit', [ArticleCategoryController::class, 'edit'])->name('article_category.edit');
    Route::post('/{id}/edit', [ArticleCategoryController::class, 'update']);
    Route::post('/{id}/delete', [ArticleCategoryController::class, 'destroy'])->name('article_category.delete');
});


