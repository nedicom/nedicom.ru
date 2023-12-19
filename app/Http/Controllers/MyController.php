<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Questions;
use App\Models\Answer;
use App\Models\Article;
use App\Models\Uslugi;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function my()
    {
        return Inertia::render('My', [
            'myQuestions' => Questions::where('user_id', '=', Auth::user()->id)->select('id')->count(),
            'myAnwers' => Answer::where('users_id', '=', Auth::user()->id)->select('id')->count(),
            'myPractice' => Article::where('userid', '=', Auth::user()->id)->select('id')->count(),
            'myUslugi' => Uslugi::where('user_id', '=', Auth::user()->id)->select('id')->count(),
        ]);
    }
}