<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Helpers\Translate;

class ArticleImport implements ToModel
{
    
    public function model(array $row){
        $url = Translate::translit($row[0]);

        $article = new Article;
        $article->userid = 1;
        $article->username = 'Марк Мина';
        $article->header = $row[0];  
        $description = $row[0];
        $article->description = $description;
        $article->body = $row[2];
        $article->url =  $url;
        $article->save();
    }
}
