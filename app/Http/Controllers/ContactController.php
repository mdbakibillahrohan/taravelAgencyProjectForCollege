<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list()
    {
        $Contacts = Contact::all();
        return view('backend.pages.contact.list_contact', ['Contacts' => $Contacts]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'number' => 'required',
            'message' => 'required'
        ]);
        if ($validate) {
            $Contact = new Contact();
            $Contact->name = $request->name;
            $Contact->email = $request->email;
            $Contact->subject = $request->subject;
            $Contact->number = $request->number;
            $Contact->message = $request->message;
            if ($Contact->save()) {
                return redirect('/');
            }
        }
    }

    public function show($id)
    {
        $Contact = Contact::find($id);
        if ($Contact) {
            return view('backend.pages.contact.contact_details', ['Contact' => $Contact]);
        } else {
            $notification = [
                "type" => "error",
                "msg" => "Contact doesn't find"
            ];
            session()->flash('notification', $notification);
            return redirect()->back();
        }
    }
}
