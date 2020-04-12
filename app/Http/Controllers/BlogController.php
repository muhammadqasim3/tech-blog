<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('web.blogs.index', compact('blogs'));
    }

    public function create(){
        return view('web.blogs.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        // New Method 
        $input = $request->all();
        $blog = Blog::create($input);

        // Old Method
        // $blog = new Blog();
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // $blog->save();
        return redirect('/blogs');
    }
}
