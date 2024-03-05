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

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'User')->get();
        return view('admin.users', compact('users'));
    }


    public function delete_user($id)
    {
        $delete = User::find($id)->delete();
        return redirect()->back()->with('flash_message_success','User Delete Successully...');
    }

    public function payments()
    {
        $payments = Payment::all();
        return view('admin.payments', compact('payments'));
    }


    public function delete_payments($id)
    {
        $delete = Payment::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Payment Delete Successully...');
    }
}
