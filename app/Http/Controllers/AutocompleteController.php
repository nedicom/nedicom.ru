<?php

namespace App\Http\Controllers;
use App\Models\Uslugi;
use Illuminate\Http\Request;

use Inertia\Inertia;

class AutocompleteController extends Controller
{
    //
    public function searchUslugi(Request $request){
        return Inertia::render('Profile/Edit', [
            'autocmpltusl' => Uslugi::orderBy('created_at','desc')
            ->where('uslugis','like','%'.$request->term.'%')
            ->get(),
        ]);
    }
}
