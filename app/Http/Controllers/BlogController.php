<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('index');
    }

    public function blog() {

        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    public function create() {
        return view('blog.create');
    }

    public function store(Request $request) {
        
        $createBlog = Blog::create($request->all());

        if($createBlog) {
            return redirect()->route('blog')->with('success', 'Blog created successfully');
        } else {
            return redirect()->route('create')->with('error', 'Blog created failed');
        }

    }

    public function edit($id) {

        $blog = Blog::find($id);

        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request) {

        $updateBlog = Blog::find($request->id);
        $updateBlog->update($request->all());

        return redirect()->route('blog')->with('success', 'Blog updated successfully');
    }

    public function delete($id) {
        $deleteBlog = Blog::find($id);
        $deleteBlog->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Blog deleted successfully'
        ], 200);
    }
}
