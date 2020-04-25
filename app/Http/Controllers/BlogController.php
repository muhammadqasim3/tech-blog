<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('web.blogs.index')->with(['blogs' => $blogs]);
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

    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('web.blogs.show')->with(['blog' => $blog]);
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('web.blogs.edit')->with(['blog' => $blog]);
    }


    public function update(Request $request, $id){
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        return redirect('blogs');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }
}
