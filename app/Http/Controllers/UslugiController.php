<?php

namespace App\Http\Controllers;

use App\Models\Uslugi;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Helpers\Translate;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UslugiController extends Controller
{

    public function index()
    {
        return Inertia::render('Uslugi/Uslugi', [
            'uslugi' => Uslugi::paginate(9),
        ]);
    }

    public function show($url){ 
        $id = Uslugi::where('url', '=', $url)->first()->id;
        return Inertia::render('Uslugi/Usluga', [
            'usluga' => Uslugi::where('url', '=', $url)->first(),
            'user' => Auth::user(),
            'lawyers' => User::where('speciality_one_id', '=', $id)->orderBy('name', 'asc')->get()->take(3),
            'practice' => Article::where('usluga_id', $id)->where('practice_file_path', '!=', null)->orderBy('updated_at', 'desc')->take(3)->get(),
            'firstlawyer' => Uslugi::where('url', '=', $url)->first()->firstlawyer,

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
        $usluga->longdescription = $request->longdescription;
        $usluga->preimushestvo1 = $request->preimushestvo1;
        $usluga->preimushestvo2 = $request->preimushestvo2;
        $usluga->preimushestvo3 = $request->preimushestvo3;
        $usluga->phone = $request->phone;
        $usluga->address = $request->address;
        $usluga->maps = $request->maps;
        $url = Translate::translit($request->header);        
        $usluga->url =  $url;
        $usluga->save();
        return redirect()->route('uslugi.url', $url);     
    }    
}