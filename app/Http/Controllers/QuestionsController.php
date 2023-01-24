<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Questions;

class QuestionsController extends Controller
{
    public function index()
    {
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Questions/Questions', [
            'questions' => Questions::paginate(9),
        ]);
    }
}
