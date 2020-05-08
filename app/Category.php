<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
