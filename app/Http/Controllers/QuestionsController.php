<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Questions;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    public function post(Request $request){
        $Question = new Questions;     
        $Question->title = $request->header;
        $Question->body = $request->body;
        $url = Translate::translit($request->header);        
        $Question->url = $url;
            if(Auth::user()){
                $Question->user_id = Auth::user()->id;
                $Question->save();
                return redirect()->route('questions.url', $url);
            }
            
            $ch = curl_init();

            $proxy = env('PROXY');
            $proxyauth = env('PROXY_AUTH');
            $url = 'https://api.openai.com/v1/chat/completions';

            $ask = $Question->body;

            $data = array(
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Your are lawyer.'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'Your task is to:'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'Understand the language of the question.'
                    ],
                    [
                        'role' => 'system',
                        'content' => 'And give an answer up to 300 characters.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $ask,
                    ],
                 ],
                'temperature' => 0.5,
                'max_tokens' => 500
            );
            $json_data = json_encode($data);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);


            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: Bearer '.env('OPENAI_API_KEY');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
           
            $response_data = json_decode($result, true);
            $generated_text = $response_data['choices'][0]['message']['content'];
            curl_close($ch);

            session(['questionTitle' => $Question->title, 'questionBody' => $ask, 'aianswer' => $generated_text]);
                return redirect()->route('questions.nonauth');   
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
