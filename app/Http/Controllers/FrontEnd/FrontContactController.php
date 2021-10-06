<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\ContactFromMail;
use App\Models\Contact;
use App\Models\Heading;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontContactController extends Controller
{
    public function index() {
        $home = Home::first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }

        $headings = Heading::latest()->first();
        $contact = Contact::take(1)->first();
        return view('frontEnd.contact',compact('home','icons', 'links', 'headings', 'contact'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('alaminislam1274@gmail.com')->send(new ContactFromMail($data));

        return redirect()->back()->with('success', 'Email Send Successfully :)');
    }
}
