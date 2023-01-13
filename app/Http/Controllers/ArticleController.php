<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ArticleController extends Controller{

    public function index(){
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Articles', [
            'articles' => Article::paginate(3),
        ]); 
    }

    /*public function index(){
        $article = Article::find(1);        
        return Inertia::render('Article', [
            'article' => $article,
        ]); 
    }*/

    public function create(Request $request)
    {
        $article = new Article;
        $article->username = $request->user;
        $article->header = $request->header;
        $article->body = $request->body;
        $article->save();
        return response()->json([
            'message' => 'New post created'
        ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
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
