<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PostphoneController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        //'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
    ]);
})->name('Welcome');

Route::post('/phone/send', [PostphoneController::class, 'postphone'])->name('phone/send');

Route::get('/yurist-po-krymenergo', function () {
    return Inertia::render('Welcome', [
    ]);
})->name('krymenergo');


Route::get('/yurist-po-nasledstvu', function () {
    return Inertia::render('Nasledstvo', [
    ]);
})->name('Nasledstvo');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lawyers', [LawyerController::class, 'index'])
    ->name('lawyers');
Route::get('/lawyers/{url}', [LawyerController::class, 'lawyer'])
    ->name('lawyer');

      


    Route::get('/articles/add', function () {
        return Inertia::render('Articles/Add');
    })->name('articles/add');

    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'index')->name('articles');
        Route::post('/articles/create', 'create')->name('articles/create');   
        Route::get('/articles/{url}', 'articleURL')->name('articles/url');
      });

    Route::get('/questions/add', function () {
        return Inertia::render('Questions/Add');
    })->name('questions/add');
      Route::controller(QuestionsController::class)->group(function () {
        Route::get('/questions', 'index')->name('questions');
        Route::post('/questions/post', 'post')->name('articles/post');
        Route::get('/questions/{url}', 'questionsURL')->name('questions/url');
      });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//import
Route::get('import/', [ImportController::class, 'import']);


/*Route::get('test', [TestController::class, 'test'])
    ->name('test');*/

require __DIR__.'/auth.php';
