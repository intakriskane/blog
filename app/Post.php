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

    //post belongs to user   //to get user name from post use this $post->user->username
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // whitelisted fields, that ar allowed to mass post to database
    protected $fillable = ['title', 'intro', 'main'];
}
