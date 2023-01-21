<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        //'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
    ]);
})->name('Welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lawyers', function () {
    return Inertia::render('Lawyers');
})->name('lawyers');




    Route::get('/articles/add', function () {
        return Inertia::render('Articles/Add');
    })->name('articles/add');
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'index')->name('articles');
        Route::post('/articles/create', 'create')->name('articles/create');   
        Route::get('/articles/{id}', 'articleId')->name('articles/article');
        //Route::post('/tasks/{id}/edit', 'editTaskById')->name('editTaskById');
        //Route::get('/tasks/{id}/delete', 'TaskDelete')->name('TaskDelete');
      });

   // Route::post('/articles/create', [ArticleController::class, 'create'])->name('articles/create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('article', ArticleController::class);

//Route::inertia('/article', 'AboutComponent');

/*
Route::get('/article', function () {
    return Inertia('Article', [
        'name' => '22',
        'article' => Article::find(1),
        //[ArticleController::class, 'index'],
    ]);
})->name('article');

Route::get('/article/{article:id}', function (Article $article) {
    return Inertia::render('Show', [
        'article' => $article
    ]);
})->name('article.show');
*/

Route::get('article', [ArticleController::class, 'index'])
    ->name('article');

Route::get('article/{article}/edit', [ArticleController::class, 'edit'])
    ->name('article.edit');

Route::post('article', [ArticleController::class, 'create']);

require __DIR__.'/auth.php';
