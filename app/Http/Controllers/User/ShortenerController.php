<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Trace;
use App\Link;
use App\User;
use App\Tag;
use Auth;
use DB;

class ShortenerController extends Controller
{
    public function links(Request $request)
    {
        $links = Link::where(['user_id' => Auth::User()->user_id,  'type' => 'Free'])->get();
        return view('user.shortener-links', compact('links'));
    }



    public function create_free()
    {
        $tags = Tag::where('user_id', Auth::User()->user_id)->get();
        return view('user.create-free', compact('tags'));
    }


    public function store_free(Request $request)
    {
        $getlink = Link::where(['orignal_link' => $request->link, 'type' => 'Free'])->first();
        if (!empty($getlink))
        {
            
            return redirect()->back()->with('flash_message_error', 'Free Link Is Already Exist');
        }else
        {
            
            
            $links = New Link();
                    

            $ip = $request->ip();
            $shorturl = Str::random(7);

            $links->ip = $ip;
            $links->orignal_link = $request->link;
            $links->short_link = $shorturl;
            $links->tags = $request->tags;
            $links->status = 'Active';
            $links->type = 'Free';
            $links->user_id = Auth::User()->user_id;

            $links->save();

            return redirect('user/shortener-links')->with('flash_message_success', 'Free Link Created Success');
        }


    }
    public function create_links()
    {
        $tags = Tag::where('user_id', Auth::User()->user_id)->get();
    	return view('user.create-links', compact('tags'));
    }

    public function store_links(Request $request)
    {
        //dd($request->all());

        $check_branded_link = Link::where(['user_id' => Auth::User()->user_id, 'short_link' => $request->short])->count();
        if ($check_branded_link > 0)
        {
            return redirect()->back()->with('flash_message_error','Branded Short URL is Allready Exist');
        }

    
        $monthly_count = DB::table('links')
                ->where('type', 'Branded')
                ->orwhere('user_id', Auth::User()->user_id)
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
        if ($monthly_count == 1500)
        {
            return redirect()->back()->with('flash_message_error','Your Monthly Limit is Complete');
        }

        
        $links = New Link();
                

        $ip = $request->ip();
        $shorturl = Str::random(7);

        $links->ip = $ip;
        $links->user_id = Auth::User()->user_id;
        $links->orignal_link = $request->link;
        if (!empty($request->short))
        {
            $links->short_link = $request->short;
        }
        else
        {
            $links->short_link = $shorturl;
        }

        $links->expiry_date = $request->expiry_date;
        $links->tags = $request->tags;
        $links->status = 'Active';
        $links->type = 'Branded';

        $links->save();
        $fullUrl = $request->link;
        $NewShortenUrl = request()->fullUrl()."/".$shorturl;

        return redirect('/user/view-links')->with('flash_message_success', 'Branded Link Created Success');
    
    }

    public function view_links()
    {
        $links = Link::where(['user_id' => Auth::User()->user_id,  'type' => 'Branded'])->get();
        //$links = json_decode(json_encode($links));
        //echo "<pre>"; print_r($links); die();
    	return view('user.view-links', compact('links'));
    }

    public function delete_links($id)
    {
        $delete = Link::find($id)->delete();
        return redirect()->back()->with('flash_message_success', 'Link Delete Successfully');
    }


    public function trace($id)
    {
        $pk = Trace::where(['user_id' => Auth::User()->user_id, 'user_country' => 'PK'])->count();
        $in = Trace::where(['user_id' => Auth::User()->user_id, 'user_country' => 'IN'])->count();
        return view('user.trace-link', compact('pk','in'));
    }
}
