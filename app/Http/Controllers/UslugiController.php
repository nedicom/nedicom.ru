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
                if($request->longdescription){
                    $usluga->longdescription = $request->longdescription;
                }
                else{
                    $usluga->longdescription = 'Это детальное описание услуги';
                }
                    if($request->preimushestvo1){
                        $usluga->preimushestvo1 = $request->preimushestvo1;
                    }
                    else{
                        $usluga->preimushestvo1 = '600+ дел';
                    }
                        if($request->preimushestvo2){
                            $usluga->preimushestvo2 = $request->preimushestvo2;
                        }
                        else{
                            $usluga->preimushestvo2 = 'Более 10 лет практики';
                        }
                            if($request->preimushestvo3){
                                $usluga->preimushestvo3 = $request->preimushestvo3;
                            }
                            else{
                                $usluga->preimushestvo3 = 'Аналитический подход к решению задачи';
                            }
                                if($request->address){
                                    $usluga->address = $request->address;
                                }
                                else{
                                    $usluga->address = 'Респ. Крым, г. Симферополь, ул. Долгоруковская, 5';
                                }
                                    if($request->phone){
                                        $usluga->phone = $request->phone;
                                    }
                                    else{
                                        $usluga->phone = '+79788838978';
                                    }
                                        if($request->maps){
                                            $usluga->maps = $request->maps;
                                        }
                                        else{
                                            $usluga->phone = 'https://yandex.ru/map-widget/v1/?um=constructor%3Af656829d54430f3c7f23ae0313146d2525f75dfbaffa3e083f51d06d98a33614&amp;source=constructor';
                                        }
        $url = Translate::translit($request->header);        
        $usluga->url =  $url;
        $usluga->save();
        return redirect()->route('uslugi.url', $url);     
    }    
}

            $table->text('longdescription')->default('Это детальное описание услуги');
            $table->text('preimushestvo1')->default('600+ дел');
            $table->text('preimushestvo2')->default('Более 10 лет практики');
            $table->text('preimushestvo3')->default('Аналитический подход к решению задачи');
            $table->text('address')->default('Респ. Крым, г. Симферополь, ул. Долгоруковская, 7');
            $table->text('phone')->default('+79788838978');
            $table->text('maps')->default('https://yandex.ru/map-widget/v1/?um=constructor%3Af656829d54430f3c7f23ae0313146d2525f75dfbaffa3e083f51d06d98a33614&amp;source=constructor');
        