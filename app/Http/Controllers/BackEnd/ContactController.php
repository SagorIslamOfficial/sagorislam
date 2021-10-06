<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $contactIndex = Contact::take(1)->get();
        return view('backEnd.contact.index', compact('contactIndex'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'lat_long' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $contactStore = new Contact();

        $contactStore->lat_long = $request->lat_long;
        $contactStore->location = $request->location;
        $contactStore->email = $request->email;
        $contactStore->phone = $request->phone;

        $contactStore->save();
        return redirect()->route('contact.index')->with('success', 'Contact Info Saved Successfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $contactEdit = Contact::findOrFail($id);
        return view('backEnd.contact.edit',compact('contactEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lat_long' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $contactUpdate = Contact::findOrFail($id);

        $contactUpdate->lat_long = $request->lat_long;
        $contactUpdate->location = $request->location;
        $contactUpdate->email = $request->email;
        $contactUpdate->phone = $request->phone;

        $contactUpdate->save();
        return redirect()->route('contact.index')->with('success', 'Contact Info Updated Successfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Contact::findOrfail($id)->delete();

        return redirect()->route('contact.index')->with('success', 'Contact Deleted successfully !');
    }
}
