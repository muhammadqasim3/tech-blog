<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // New Method 
        $input = $request->all();

//        image upload
//        if($request->hasFile('featured_image')){
//           $filename = $request->file('featured_image');
//           $input['featured_image'] = Storage::putFile('blogs', $filename);
//        }




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
//        Checked boxes
        $selected_categories = [];
        foreach($blog->category as $category){
            $selected_categories[] = $category->id -1;
        }

        $filtered_categories = array_except($categories, $selected_categories);
        return view('web.blogs.edit')->with(['blog' => $blog,
                                                    'categories' => $categories,
                                                    'filtered_categories' => $filtered_categories]);
    }


    public function update(Request $request, $id){
        $input = $request->except(['featured_image']);

        // image upload
        if($request->hasFile('featured_image')) {
                $filename = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_EXTENSION);
                $fullFileName = $filename . "_" . time() . ".". $extension;
                $request->featured_image->storeAs('images', $fullFileName ,'public');  //folder, filename, disk
                $blog = Blog::findOrFail($id);
                $blog->update(['featured_image' => $fullFileName]);
            }

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
