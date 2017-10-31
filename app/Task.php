<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function scopeIncomplete($query) // Task::incomplete()
    //can be used to pass value scopeIncomplete('$query', 'val') 
    //that way you can do this Task::incomplete('fuzz')
    {
        return $query->where('completed', 0);
    }
}
