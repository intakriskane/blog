<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    // whitelisted fields, that ar allowed to mass post to database
    protected $fillable = ['username', 'first_name', 'last_name', 'password', 'email'];
}
