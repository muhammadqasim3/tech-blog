<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('web.blogs.index')->with(['blogs' => $blogs]);
    }

    public function create(){
        $categories = Category::all();
        return view('web.blogs.create')->with(['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        // New Method 
        $input = $request->all();
        $blog = Blog::create($input);
//      Once blog is created, make it sync with categories
        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }



        // Old Method
        // $blog = new Blog();
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // $blog->save();
        return redirect('/blogs');
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        $category = $blog->category->toArray();
        return view('web.blogs.show')->with(['blog' => $blog, 'categories' => $category]);
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('web.blogs.edit')->with(['blog' => $blog, 'categories' => $categories]);
    }


    public function update(Request $request, $id){
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        //      Once blog is updated, make it sync with categories
        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect('blogs');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }

    public function trash(){
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('web.blogs.trash')->with(['trashedBlogs' => $trashedBlogs]);
    }

    public function restore($id){
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete($id){
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return redirect('blogs/trash');
    }

}
