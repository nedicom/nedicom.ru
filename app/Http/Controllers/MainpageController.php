<?php

namespace App\Http\Controllers;

use App\Models\Uslugi;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Inertia\Inertia;


class MainpageController extends Controller
{

    public function main()
    {
        
        return Inertia::render('Welcome', [
            'uslugislider' => Uslugi::with('firstlawyer')->where('is_main', '=', 1)->get(),
            'practice' => Article::where('practice_file_path', '!=', null)->orderBy('updated_at', 'desc')->take(10)->get(),
        ]);
    }
    
}