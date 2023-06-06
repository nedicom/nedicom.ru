<?php

namespace App\Http\Controllers;

use App\Models\Uslugi;
use App\Http\Controllers\Controller;
use App\Helpers\Translate;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UslugiController extends Controller
{

    public function index()
    {
        return Inertia::render('Uslugi/Uslugi', [
            'uslugi' => Uslugi::paginate(9),
        ]);
    }

    public function show($url){ 
        return Inertia::render('Uslugi/Usluga', [
            'usluga' => Uslugi::where('url', '=', $url)->first(),
            'user' => Auth::user(),
        ]);
    }

    public function formadd()
    {       
        return Inertia::render('Uslugi/Add'); 
    }

    public function create(Request $request){
        $usluga = new Uslugi;
        $usluga->usl_name = $request->header;
        $usluga->usl_desc = $request->description;
        $url = Translate::translit($request->header);        
        $usluga->url =  $url;
        $usluga->save();
        return redirect()->route('uslugi');
    }

    public function edit(string $url)
    {
        return Inertia::render('Uslugi/Edit', [
            'uslugi' => Uslugi::where('id', '=', $url)->first(),
        ],  
    );
    }

    public function update(Request $request)
    {   
        $id = $request->id;
        $usluga = Uslugi::find($id);
        $usluga->usl_name = $request->header;
        $usluga->usl_desc = $request->description;
        $url = Translate::translit($request->header);        
        $usluga->url =  $url;
        $usluga->save();
        return redirect()->route('uslugi.url', $url);     
    }    
}