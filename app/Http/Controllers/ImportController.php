<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArticleImport;

class ImportController extends Controller
{
    public function import()
    {
        Excel::import(new ArticleImport, 'ArticleImport.csv');
        return redirect('/')->with('success', 'All good!');
    }
}