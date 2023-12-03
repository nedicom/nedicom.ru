<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Questions;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Helpers\Translate;
use App\Models\User;

class QuestionsController extends Controller
{
    public function index()
    {
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Questions/Questions', [
            'questions' => Questions::paginate(9),
        ]);
    }

    public function myQuestions()
    {
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Questions/MyQuestions', [
            'questions' => Questions::paginate(9),
        ]);
    }

    public function questionsURL($url){ 
        $id = Questions::where('url', '=', $url)->pluck('id')->first();  
        return Inertia::render('Questions/Question', [
            'question' => Questions::where('id', '=', $id)->first(),
            'answers' => Answer::where('questions_id', '=', $id)->with('UserAns')->get(),
            /*'ownercookie' => [
                'questionTitle' => session()->get(key: 'questionTitle'), 
                'questionBody' => session()->get(key: 'questionBody'),
                'aianswer' => session()->get(key: 'aianswer'),
            ], */
        ]);
    }

    public function questionsNonAuth(){  
        return Inertia::render('Questions/QuestionNA', [
            'ownercookie' => [
                'questionTitle' => session()->get(key: 'questionTitle'), 
                'questionBody' => session()->get(key: 'questionBody'),
                'aianswer' => session()->get(key: 'aianswer'),
            ], 
        ]);
    }
    

    public function questionAdd(){  
        return Inertia::render('Questions/Add', [
            'lawyers' => User::all()->where('lawyer', 1),
        ]);
    }

    public function post): JsonResponse{
        {
            $search = "laravel get ip address";
      
            $data = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
                      ])
                      ->post("https://api.openai.com/v1/chat/completions", [
                        "model" => "gpt-3.5-turbo",
                        'messages' => [
                            [
                               "role" => "user",
                               "content" => $search
                           ]
                        ],
                        'temperature' => 0.5,
                        "max_tokens" => 200,
                        "top_p" => 1.0,
                        "frequency_penalty" => 0.52,
                        "presence_penalty" => 0.5,
                        "stop" => ["11."],
                      ])
                      ->json();
      
            return response()->json($data['choices'][0]['message'], 200, array(), JSON_PRETTY_PRINT);
        }
    }
    }

    public function delete(int $id)
    {
        if(Auth::user()->id == Questions::find($id)->user_id){
            Questions::find($id)->delete();
            return redirect()->back()->with('success', 'Все в порядке, вопрос удален');
        }
        else{
            return redirect()->back()->with('success', 'Удалять вопросы могут только собственники или админ.');
        }     
    }
}
