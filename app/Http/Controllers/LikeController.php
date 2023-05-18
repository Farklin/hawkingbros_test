<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, $article)
    {
        Like::create([
            'article_id' => $article, 
            'ball' => 1,
        ]); 

        return back(); 
    }

    public function unlike(Request $request, $article)
    {
        Like::create([
            'article_id' => $article, 
            'ball' => -1,
        ]); 
        return back(); 
    }

}
