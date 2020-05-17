<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'body',
        'featured_image'
    ];

    protected $appends = [];

//    protected $with =  ['category'];

    public function category() {
       return $this->belongsToMany(Category::class);
    }

}
