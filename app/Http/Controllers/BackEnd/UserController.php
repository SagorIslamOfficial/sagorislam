<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $aboutMe = AboutUs::latest()->first();
        $contact = Contact::latest()->first();
        $home = Home::latest()->take(1)->first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }
        return view('backEnd.userProfile.index', compact('aboutMe', 'contact', 'home', 'icons', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $userProfileEdit = Auth::user()->findOrFail($id);
        return view('backEnd.userProfile.edit', compact('userProfileEdit'));
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
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'phone' => ['required', 'min:11'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg|max:1024']
        ]);

        $userProfileUpdate = Auth::user()->findOrFail($id);

        $userProfileUpdate->name = request('name');
        $userProfileUpdate->email = request('email');
        $userProfileUpdate->password = bcrypt(request('password'));
        $userProfileUpdate->phone = request('phone');


        $profileImage = $request->file('avatar');

        if (isset($profileImage)){

            $slug = str_slug($userProfileUpdate->name);
            $imageName = $slug. '.'. $profileImage->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('user')){
                Storage::disk('public')->makeDirectory('user');
            }

            if (Storage::disk('public')->exists('user/'. $userProfileUpdate->avatar)){
                Storage::disk('public')->delete('user/'. $userProfileUpdate->avatar);
            }

            $imageResize = Image::make($profileImage)->resize(150, 150)->stream();
            Storage::disk('public')->put('user/'.$imageName,$imageResize);

            $userProfileUpdate->avatar = $imageName;
        }
        $userProfileUpdate->save();

        return redirect()->route('user.index')->with('success', 'Profile Info updated successfully !');
    }
    
}
