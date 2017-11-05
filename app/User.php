<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model //implements Authenticatable
{
    // whitelisted fields, that ar allowed to mass post to database
    protected $fillable = ['username', 'first_name', 'last_name', 'password', 'email'];
    
    //encrypting the password for storing in database
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


}
