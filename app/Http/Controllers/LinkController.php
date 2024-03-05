<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Link;

class LinkController extends Controller
{
    public function index()
    {
    	return view('links');
    }

    public function store(Request $request)
    {
    	$getlink = Link::where('orignal_link', $request->link)->first();
    	if (!empty($getlink))
    	{
    		$shorturl = $getlink->short_link;
            
            $count = $getlink->count; 
            $new_count = $count+1;
            $links = Link::find($getlink->id);
            $links->count = $new_count;
            $links->update();

    		$NewShortenUrl = request()->fullUrl()."/".$shorturl;
    		return view('links', compact('NewShortenUrl'));
    	}else
    	{
    		$links = New Link();
    		    	

	    	$ip = $request->ip();
	    	$shorturl = Str::random(7);

	    	$links->ip = $ip;
	    	$links->orignal_link = $request->link;
	    	$links->short_link = $shorturl;

	    	$links->save();

	    	$NewShortenUrl = request()->fullUrl()."/".$shorturl;

	    	return view('links', compact('NewShortenUrl'));
    	}
    	
    }

    public function link($link)
    {
    	$getlink = Link::where(['short_link' => $link, 'status' => 'Active'])->first();
    	if (!empty($getlink))
    	{
            $count = $getlink->count; 
            $new_count = $count+1;
            $links = Link::find($getlink->id);
            $links->count = $new_count;
            $links->update();

    		$orignal_link = $getlink->orignal_link;
    		return redirect($orignal_link);
    	}else
    	{
    		return redirect()->back()->with('flash_message_error','Sorry Your Link is Expired...');
    	}
    	
    }
}
