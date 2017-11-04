<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function scopeDescending($allArticles)
    // {
    //         return $allArticles->orderBy('created_at', 'desc');
    // } 

    //getting articles in descending order
    public function scopeDesc($allArticles)
    {
            return $allArticles->orderBy('created_at', 'desc');
    } 

    public function scopeLatest($allArticles)
    {
        return $allArticles->orderBy('id', 'desc')->take(3);
    }

    // whitelisted fields, that ar allowed to mass post to database
    protected $fillable = ['title', 'intro', 'main'];
}
