<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Auth;
use DB;

class BlogController extends Controller
{
    public function create()
    {
        return view('admin.add-blog');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $blog = New Blog();

        $blog->author = $request->author;
        $blog->title = $request->title;
        $blog->description = $request->content;

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->move('back_end/uploads/blogs/',$filename);
            $blog->image = $filename;
        }
        else
        {
            $blog->image = '';

        }


        $blog->save();
        return redirect('admin/view-blog')->with('flash_message_success', 'Blog Created Successfully...');
    }


    public function view()
    {
        $blogs = Blog::get();
        return view('admin.blogs', compact('blogs'));
    }

    public function del_blog($id)
    {
        $delete = Blog::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Blog Delete Successully...');
    }
}
