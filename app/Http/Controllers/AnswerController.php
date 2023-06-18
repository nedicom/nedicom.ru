<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\URL;


class AnswerController extends Controller
{
    public function post(Request $request){
        $Answer = new Answer;
        $Answer->body = $request->body;
        $Answer->questions_id = $request->questions_id;
        $Answer->users_id = Auth::user()->id;
        $Answer->save();
        $url = $request->url;
        return redirect()->route('questions.url', $url);
    }
}
