<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $input = $request->except(['featured_image']);
        // meta stuff
        $input['slug'] = Str::slug($input['title'], '-');
        $input['meta_title'] = Str::limit($input['title'], '60');
        $input['meta_description'] = Str::limit($input['body'], '155');

        // image upload
        if($request->hasFile('featured_image')) {
            //  saving image name
            $filename = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $filename . "_" . time() . ".". $extension;
            $request->featured_image->storeAs('blogs', $fullFileName ,'public');  //folder, filename, disk
            $input['featured_image'] = $fullFileName;
        }

        $blog = Blog::create($input);
//      Once blog is created, make it sync with categories
        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect('/blogs');
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
//        dd($blog, $blog->meta_title, $blog->meta_description);
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
        // meta stuff
        $input['slug'] = Str::slug($input['title'], '-');
        $input['meta_title'] = Str::limit($input['title'], '60');
        $input['meta_description'] = Str::limit($input['body'], '155');
        // image upload
        if($request->hasFile('featured_image')) {
            //  remove old image if exists
            $blog = Blog::findOrFail($id);
            if ($blog->featured_image){
                Storage::delete('public/blogs/'. $blog->featured_image);
            }
            //  saving image name
            $filename = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($request->featured_image->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $filename . "_" . time() . ".". $extension;
            $request->featured_image->storeAs('blogs', $fullFileName ,'public');  //folder, filename, disk

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
