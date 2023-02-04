<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        //'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
    ]);
})->name('Welcome');

Route::get('/yurist-po-krymenergo', function () {
    return Inertia::render('Welcome', [
    ]);
})->name('Welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lawyers', [LawyerController::class, 'index'])
    ->name('lawyers');


    Route::get('/articles/add', function () {
        return Inertia::render('Articles/Add');
    })->name('articles/add');
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'index')->name('articles');
        Route::post('/articles/create', 'create')->name('articles/create');   
        //Route::get('/articles/{id}', 'articleId')->name('articles/article'); for SEO the HFU were created
        Route::get('/articles/{url}', 'articleURL')->name('articles/url');
        //Route::post('/tasks/{id}/edit', 'editTaskById')->name('editTaskById');
        //Route::get('/tasks/{id}/delete', 'TaskDelete')->name('TaskDelete');
      });

    Route::get('/questions/add', function () {
        return Inertia::render('Questions/Add');
    })->name('questions/add');
      Route::controller(QuestionsController::class)->group(function () {
        Route::get('/questions', 'index')->name('questions');
        Route::post('/questions/post', 'post')->name('articles/post');
        Route::get('/questions/{url}', 'questionsURL')->name('questions/url');
      });

   // Route::post('/articles/create', [ArticleController::class, 'create'])->name('articles/create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//import
Route::get('import/', [ImportController::class, 'import']);

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
