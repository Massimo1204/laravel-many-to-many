<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_source' => 'required',
            'title' => 'required|max:50',
            'content' => 'required',
        ],
        [
            'required' => ':attribute is required',
            'max:50' =>':attribute is too long'
        ]);

        $data = $request->all();

        $newPost = new Post;
        $newPost->user_id = Auth::id();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->image_source = $data['image_source'];
        $newPost->slug = "slugPlaceHolder-12341414141214252236";
        $newPost->save();
        $newPost->categories()->sync($data['category']);
        $newPost->slug = Str::slug($newPost->title, '-') . "-$newPost->id";
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost)->with('message', "Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'image_source' => 'required',
            'title' => 'required|min:3|max:50|',
            'content' => 'required|min:3',
        ],
        [
            'required' => ':attribute is required',
            'max' => ':attribute is too long',
            'min' => ':attribute is too short'
        ]);

        $post->image_source = $request['image_source'];
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->categories()->sync($request['category']);
        $post->update();

        return redirect()->route('admin.posts.show', compact('post'))->with('edited-message', 'Post successfully modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted-message', 'Post successfully deleted');
    }
}
