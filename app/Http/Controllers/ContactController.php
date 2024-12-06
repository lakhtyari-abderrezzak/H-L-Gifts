<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\Enquiry;
use Illuminate\Http\Request;
use App\Models\Contact as ModelsContact;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function sendEnquiry(Request $request){
        $data = $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'contentMessage' => 'required',
        ]);

        ModelsContact::create($data);

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new Enquiry($data));

        return redirect()->back()->with('success', 'Message Was Sent Successfully');

    }
}
