<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class LawyerController extends Controller
{

    public function index()
    {
        return Inertia::render('Lawyers/Lawyers', [
            'lawyers' => User::where('lawyer', 1) -> paginate(9),
        ]);
    }

     public function lawyer($id){ 
        return Inertia::render('Lawyers/Lawyer', [
            'lawyer' => User::where('id', '=', $id)->first(),
        ]);
    }

}