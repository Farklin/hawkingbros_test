<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $artciles = Article::all(); 
        return view('article', compact('artciles')); 
    }
}
