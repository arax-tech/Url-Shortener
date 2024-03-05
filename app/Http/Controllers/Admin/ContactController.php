<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\User;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $contact = New Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('flash_message_success', 'Thanks For Contact We Will Get Back to You ASP...');
    }

    public function contacts()
    {
        $contacts = Contact::get();
        return view('admin.contacts', compact('contacts'));
    }

    
    public function delete_contacts($id)
    {
        $delete = Contact::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Contact Delete Successully...');
    }
}
