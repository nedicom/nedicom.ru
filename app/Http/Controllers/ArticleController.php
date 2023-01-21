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

class ArticleController extends Controller{

    public function index(){
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Articles/Articles', [
            'articles' => Article::paginate(9),
        ]); 
    }

    public function create(Request $request){
        $article = new Article;
        $article->userid = Auth::user()->id;
        $article->username = Auth::user()->name;
        $article->header = $request->header;
        $article->body = $request->body;
        $article->save();
        $id = $article->id;        
        return redirect() -> route('articles/article', $id);
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

    public function articleId($id){
        return Inertia::render('Articles/Article', [
            'article' => Article::find($id),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
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
}
