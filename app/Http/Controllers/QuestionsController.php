<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Translate;

class QuestionsController extends Controller
{
    public function index()
    {
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Questions/Questions', [
            'questions' => Questions::paginate(9),
        ]);
    }

    public function questionsURL($url){ 
        return Inertia::render('Questions/Question', [
            'question' => Questions::where('url', '=', $url)->first(),
        ]);
    }

    public function post(Request $request){
        $Question = new Questions;
        $Question->user_id = Auth::user()->id;
        $Question->title = $request->header;
        $Question->body = $request->body;
        $url = Translate::translit($request->header);        
        $Question->url =  $url;
        $Question->save();
        return redirect()->route('questions/url', $url);
    }
}
