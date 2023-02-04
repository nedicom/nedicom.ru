<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{

    public function index()
    {
        return Inertia::render('Lawyers/Lawyers', [
            'lawyers' => User::where('lawyer', 1) -> paginate(9),
        ]);
    }

    

   /* public function articleURL($url){ 
        return Inertia::render('Articles/Article', [
            'article' => Article::where('url', '=', $url)->first(),
        ]);
    }*/

}