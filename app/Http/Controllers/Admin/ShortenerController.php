<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\Link;
use Auth;
use DB;

class ShortenerController extends Controller
{
    public function links(Request $request)
    {
        $ip = $request->ip();
        $links = Link::where('ip', $ip)->orWhere('type', 'Free')->get();
        return view('admin.shortener-links', compact('links'));
    }

   
    
    public function view_links()
    {
        $links = Link::where('type', 'Branded')->get();
        //$links = json_decode(json_encode($links));
        //echo "<pre>"; print_r($links); die();
    	return view('admin.view-links', compact('links'));
    }

    public function delete_links($id)
    {
        $delete = Link::find($id)->delete();
        return redirect()->back()->with('flash_message_success', 'Link Delete Successfully');
    }
}
