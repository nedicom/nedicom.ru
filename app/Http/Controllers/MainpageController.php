<?php

namespace App\Http\Controllers;

use App\Models\Uslugi;
use App\Http\Controllers\Controller;
use Inertia\Inertia;


class MainpageController extends Controller
{

    public function main()
    {
        
        return Inertia::render('Welcome', [
            'uslugislider' => Uslugi::with('firstlawyer')->where('is_main', '=', 1)->get(),
        ]);
    }
    
}