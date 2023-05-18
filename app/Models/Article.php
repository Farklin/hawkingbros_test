<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'pubdate']; 

    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id' ); 
    }

    public function countLikes()
    {
        return $this->likes() - $this->unelike(); 
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('ball', ">", 0)->count();
    }

    public function unelikes()
    {
        return $this->hasMany(Like::class)->where('ball', "<", 0)->count();
    }
}
