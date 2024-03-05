<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\Link;
use Auth;
use DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
            

    		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'User', 'status' => 'Active']))
    		{
    			return redirect('user/dashboard');
    		}
    		else
	    	{
	    		return redirect()->back()->with('flash_message_error','Invalid Email Or Password...');
	    	}
    	}
    	return view('user.login');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post'))
        {
        	$check_user = User::where('email', $request->email)->count();
        	if ($check_user>0)
        	{
        	    return redirect()->back()->with('flash_message_error','Sorry This Email Is Already Taken...');
        	}

        	$user = New User();

        	$user->user_id = rand(350000,800000);
            $user->name = $request->name;
        	$user->email = $request->email;
        	$user->password = Hash::make($request->password);
        	$user->role = "User";
            $user->status = "Active";
        	$user->save();
        	if ($user==TRUE)
        	{
               if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'User', 'status' => 'Active']))
                {
                    return redirect('/')->with('confirmation', 'modal');
                }
        	}
        	else
        	{
        	    return redirect()->back()->with('flash_message_error','Something is Wrong Please Try Again');
        	}
        }

        return view('user.register');
    }

    public function dashboard(Request $request)
    {

        /*Free Links*/
        $free_links = Link::where(['user_id' => Auth::User()->user_id,  'type' => 'Free'])->count();

        /*Branded Links*/
        $branded_links = Link::where(['user_id' => Auth::User()->user_id,  'type' => 'Branded'])->count();

        /*Active Links*/
        $active_links = Link::where(['user_id' => Auth::User()->user_id, 'status' => 'Active'])->count();

        /*Expired Links*/
        $expied_links = Link::where(['user_id' => Auth::User()->user_id, 'status' => 'Expired'])->count();




    	return view('user.dashboard', compact('free_links', 'branded_links', 'active_links', 'expied_links'));
    }


    public function profile()
    {
    	return view('user.profile');
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('back_end/uploads/users/',$filename);
            $user->image = $filename;
        }
        else
        {
            $user->image = $request->currnt_img;

        }


        $user->save();

        if ($user==TRUE)
        {
          return redirect()->back()->with('flash_message_success','Profile Update Successfully');
        }
        else
        {
          return redirect()->back()->with('flash_message_error','Something is Wrong Please Try Again');
        }
    }

    public function password(Request $request)
    {
        return view('user.password');
    }

    public function update_password(Request $request)
    {


        //dd($request->all());
        if (!(Hash::check($request->get('current_password'),Auth::user()->password)))
        {
            return redirect()->back()->with('flash_message_error','Current Password is Incorrect...');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password'))==0)
        {
            return redirect()->back()->with('flash_message_error','Your New Password Can not be Same...');
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with('flash_message_success','Password Update Success');

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('flash_message_success','Logout Successully...');
    }

    public function cancel()
    {
        $id = Auth::User()->id;
        $delete = User::find($id)->delete();
        return redirect('/register')->with('flash_message_error','Payment Cancelled...');
    }
}
