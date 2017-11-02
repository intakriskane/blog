<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function scopeDescending($allArticles)
    // {
    //         return $allArticles->orderBy('created_at', 'desc');
    // } 

    public function scopeDesc($allArticles)
    {
            return $allArticles->orderBy('created_at', 'desc');
    } 
}
