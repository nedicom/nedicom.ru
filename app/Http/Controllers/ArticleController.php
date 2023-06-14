<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\Translate;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    public function index()
    {  
        return Inertia::render('Articles/Articles', [
            'articles' => Article::paginate(9),
        ]);
    }

    public function formadd()
    {
        return Inertia::render('Articles.Add');    
    }

    public function create(Request $request){
        $article = new Article;
        $article->userid = Auth::user()->id;
        $article->username = Auth::user()->name;
        $article->header = $request->header;
        $article->description = $request->description;
        $article->body = $request->body;
        $url = Translate::translit($request->header);        
        $article->url =  $url;
        $article->save();
        return redirect()->route('articles/url', $url);
    }

    public function edit(string $url)
    {
        return Inertia::render('Articles/Edit', [
            'article' => Article::where('url', '=', $url)->first(),
        ],  
    );
    }

    public function update(Request $request)
    {   
        $id = $request->id;
        $article = Article::find($id);
        $article->header = $request->header;
        $article->description = $request->description;
        $article->body = $request->body;
        $url = Translate::translit($request->header);        
        $article->url =  $url;
        $article->save();
        return redirect()->route('articles/url', $url);     
    }    

    public function store(StoreArticleRequest $request)
    {
        //
    }

    /*public function articleId($id){ //for SEO the HFU were created
        return Inertia::render('Articles/Article', [
            'article' => Article::find($id),
        ]);
    }*/

    public function articleURL($url){ 
        return Inertia::render('Articles/Article', [
            'article' => Article::where('url', '=', $url)->first(),
            'user' => Auth::user(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        Article::find($id)->delete();
        return redirect()->back()->with('success', 'Все в порядке, статья удалена');
    }

    //import

}