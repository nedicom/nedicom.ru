<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {        
        return Inertia::render('Dashboard', [
            'articles' => Article::paginate(6),
        ]);
        
    }
}