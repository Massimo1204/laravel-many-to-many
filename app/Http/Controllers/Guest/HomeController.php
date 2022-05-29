<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
        return view('guests.index', compact('posts'));
    }

    public function show(Post $post){
        return view('guests.show', compact('post'));
    }
}
