<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Tag;
use Auth;


class TagController extends Controller
{
    public function create()
    {
        return view('user.create-tag');
    }

    public function store(Request $request)
    {
        $check_tag = Tag::where(['user_id' => Auth::User()->user_id, 'tags' => $request->tag])->count();
        if ($check_tag > 0)
        {
            return redirect()->back()->with('flash_message_error','Tag is Allready Exist');
        }

        $tags = New Tag();
        $tags->user_id = Auth::User()->user_id;
        $tags->tags = $request->tag;
        $tags->save();
        return redirect('/user/view-tag')->with('flash_message_success','Tag Created Successfully');
    }

    public function view()
    {
    	$tags = Tag::get();
    	return view('user.view-tags', compact('tags'));
    }

    public function delete($id)
    {
    	$tags = Tag::find($id)->delete();
    	return redirect()->back()->with('flash_message_success', 'Tag Delete Successfully');
    }
}
