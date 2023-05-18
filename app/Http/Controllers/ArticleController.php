<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $artciles = Article::selectRaw('`articles`.*, ((SELECT COUNT(`likes`.`id`) FROM `likes` WHERE `likes`.`article_id` = `articles`.`id` AND `ball` > 0) - (SELECT COUNT(`likes`.`id`) FROM `likes` WHERE `likes`.`article_id` = `articles`.`id` AND `ball` < 1)) AS `ALL_LIKES`')
        ->orderBy('ALL_LIKES', 'DESC')->orderBy('updated_at','desc')->paginate(10); 

        return view('article', compact('artciles')); 
    }
}
