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

class ArticleController extends Controller
{

    public function index()
    {
        //dd(Article::paginate(3)->toArray());
        return Inertia::render('Articles/Articles', [
            'articles' => Article::paginate(9),
        ]);
    }

    public function create(Request $request)
    {
        $article = new Article;
        $article->userid = Auth::user()->id;
        $article->username = Auth::user()->name;
        $article->header = $request->header;
        $article->body = $request->body;
        
        function translit_sef($value){        
            $converter = array(        
                'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        
                'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        
                'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        
                'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        
                'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        
                'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        
                'э' => 'e',    'ю' => 'yu',   'я' => 'ya',        
            );
            $value = mb_strtolower($value);        
            $value = strtr($value, $converter);        
            $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);        
            $value = mb_ereg_replace('[-]+', '-', $value);        
            $value = trim($value, '-');	        
            $value = mb_strimwidth($value, 0, 20);        
            return $value;
        }

        $url = translit_sef($article->header);
        $article->url =  $url;
        $article->save();
        $id = $article->id;
        return redirect()->route('articles/article', $id);
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

    public function articleId($id)
    {
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