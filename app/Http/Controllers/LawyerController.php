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

     public function lawyer($url){ 
        return Inertia::render('Lawyers/Lawyer', [
            'lawyer' => User::where('id', '=', $url)->first(),
        ]);
    }

}