<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Blog;
use App\Link;
use App\Trace;
use DB;


class IndexController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();

        $getUserLink = Link::where('ip', $ip)->limit(5)->orderBy('id','DESC')->get();

        //$getUserLink = json_decode(json_encode($getUserLink));
        //echo "<pre>"; print_r($getUserLink);die();
        
    	return view('index', compact('getUserLink'));
    }

    public function shortener(Request $request)
    {
        //dd($request->all());

        

        $getlink = Link::where('orignal_link', $request->link)->first();
        if (!empty($getlink))
        {
            $shorturl = $getlink->short_link;
            
            $count = $getlink->count; 
            $new_count = $count+1;
            $links = Link::find($getlink->id);
            $links->count = $new_count;
            $links->update();

            $fullUrl = $request->link;
            $NewShortenUrl = request()->fullUrl()."/".$shorturl;
            return redirect()->back()->with(['NewShortenUrl' => $NewShortenUrl, 'fullUrl' => $fullUrl]);
        }else
        {
            $daily_count = DB::table('links')
                    ->whereDate('created_at', Carbon::today()->toDateString())
                    ->count();
            //dd($daily_count);
            if ($daily_count >= 5)
            {
                return redirect()->back()->with('flash_message_error','Your Daily Limit is Complete');
            }


            
            $links = New Link();
                    

            $ip = $request->ip();
            $shorturl = Str::random(7);

            $links->ip = $ip;
            $links->orignal_link = $request->link;
            $links->short_link = $shorturl;
            $links->status = 'Active';
            $links->type = 'Free';

            $links->save();
            $fullUrl = $request->link;
            $NewShortenUrl = request()->fullUrl()."/".$shorturl;

            return redirect()->back()->with(['NewShortenUrl' => $NewShortenUrl, 'fullUrl' => $fullUrl]);
        }
    }

    public function link($link)
    {
        $getlink = Link::where(['short_link' => $link, 'status' => 'Active'])->first();
        if (!empty($getlink))
        {
            


            /*Get Link Info */
            $link_details = Link::where('short_link', $link)->first();

            $real_ip_adress = $_SERVER['REMOTE_ADDR'];
            
            $cip = $real_ip_adress;
            $iptolocation = 'http://api.hostip.info/country.php?ip=' . $cip; 
            $creatorlocation = file_get_contents($iptolocation);/*Country Code*/



            $trace = New Trace();
            $trace->user_id = $link_details->user_id;
            $trace->short_url = $link_details->short_link;
            $trace->user_ip = $real_ip_adress;
            $trace->user_country = $creatorlocation;
            $trace->save();

            


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




    public function pricing()
    {
    	return view('pricing');
    }

    public function faq()
    {
    	return view('faq');
    }

    public function blog()
    {
        $latests = Blog::orderBy('id', 'DESC')->get();
        $blogs = Blog::paginate(3);
    	return view('blog', compact('blogs', 'latests'));
    }

    public function blogs($id)
    {
        $latests = Blog::orderBy('id', 'DESC')->get();
        $blog = Blog::where('id', $id)->first();
        return view('blog-details', compact('blog', 'latests'));
    }
}
