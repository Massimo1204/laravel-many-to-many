<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'image_source', 'slug'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
