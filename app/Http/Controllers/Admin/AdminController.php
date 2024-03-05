<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Payment;
use App\User;
use App\Link;
use Auth;
use DB;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
            
    		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin', 'status' => 'Active']))
    		{
    			return redirect('admin/dashboard');
    		}
    		else
	    	{
	    		return redirect()->back()->with('flash_message_error','Invalid Email Or Password...');
	    	}
    	}
    	return view('admin.login');
    }

   
    public function dashboard(Request $request)
    {
        /*Free Links*/
        $ip = $request->ip();
        $free_links = Link::whereNull('expiry_date')->count();

        /*Branded Links*/
        $branded_links = Link::where('type', 'Branded')->count();

        /*Active Links*/
        $active_links = Link::where(['status' => 'Active'])->count();

        /*Expired Links*/
        $expied_links = Link::where(['status' => 'Expired'])->count();


        /*Total User*/
        $users = User::where('role', 'User')->count();

        /*Total Payments*/
        $payments = Payment::count();



    	return view('admin.dashboard', compact('free_links', 'branded_links', 'active_links', 'expied_links', 'users', 'payments'));
    }


    public function profile()
    {
    	return view('admin.profile');
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
            $file->move('back_end/uploads/admins/',$filename);
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
        return view('admin.password');
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
        return redirect('/admin/login')->with('flash_message_success','Logout Successully...');
    }
}
