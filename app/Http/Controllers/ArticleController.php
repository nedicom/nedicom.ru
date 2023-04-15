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

        //$url = Storage::url('storage/app/public/images/landing/nasledstvo/mainpc.jpg');
        //echo asset($url);
        return Inertia::render('Articles/Articles', [
            'articles' => Article::paginate(9),
        ]);
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

    public function edit(Article $article)
    {
        return Inertia::render('article/Edit', [
            'article' => [
                'id' => $article->id,
                'header' => $article->header,
                'body' => $article->body,
            ],
        ]);
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
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    //import

}