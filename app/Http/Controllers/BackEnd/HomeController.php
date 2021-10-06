<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $homeContent = Home::latest()->get();
        return view('backEnd.home.index', compact('homeContent'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('backEnd.home.create');
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
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:700',
            'bg_image' => 'required|image|mimes:jpeg,jpg,png|max:2024',
            'big_text' => 'required|string',
            'small_text' => 'required|string',
            'link' => 'required',
            'footer_text' => 'required|string',
            'footer_link' => 'required',
            'social_icon' => 'required',
            'social_link' => 'required'
        ]);

        //Here is the Eloquent Method
        $home = new Home();

        //Find form logo and storing into a variable
        $logoImage = $request->file('logo');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($logoImage)){
            //Creating image slug
            $slug = str_slug("logo_image_of_sagorislam.com");
            //Make unique name for image
            $logoImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $logoImage->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('home')){
                Storage::disk('public')->makeDirectory('home');
            }

            //Save image and resize image
            $LogoImageResize = Image::make($logoImage)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('home/'.$logoImageName,$LogoImageResize);

            //And save data into the database
            $home->logo = $logoImageName;
        }


        //Find form bgImage and storing into a variable
        $image = $request->file('bg_image');

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->big_text);
            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('home')){
                Storage::disk('public')->makeDirectory('home');
            }

            //Save image and resize image
            $imageResize = Image::make($image)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('home/'.$imageName,$imageResize);

            //And save data into the database
            $home->bg_image = $imageName;
        }

        $home->big_text = $request->big_text;
        $home->small_text = $request->small_text;
        $home->link = $request->link;
        $home->footer_text = $request->footer_text;
        $home->footer_link = $request->footer_link;

        //Using implode because of passing array in form fields and if we dont use implode then it show cant convert array to string :)
        $home->social_icon = implode(',',$request->social_icon);
        $home->social_link = implode(',',$request->social_link);

        $home->save();
        return redirect()->route('home.index')->with('success', 'Home Info Saved Successfully :)');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homeEdit = Home::first();
        if (!empty($homeEdit)){
            $iconsEdit = explode(',', $homeEdit->social_icon);
            $linksEdit = explode(',', $homeEdit->social_link);
        }else{
            $iconsEdit = [];
            $linksEdit = [];
        }
//        dd($iconsEdit, $linksEdit);
        return view('backEnd.home.edit',compact('homeEdit','iconsEdit', 'linksEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:700',
            'bg_image' => 'image|mimes:jpeg,jpg,png|max:2024',
            'big_text' => 'required|string',
            'small_text' => 'required|string',
            'link' => 'required|url',
            'footer_text' => 'required|string',
            'footer_link' => 'required|url',
            'social_icon' => 'required',
            'social_link' => 'required'
        ]);

        //Here is the Eloquent Method
        $homeUpdate = Home::findOrFail($id);

        //Find form logo and storing into a variable
        $logoImage = $request->file('logo');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($logoImage)){
            //Creating image slug
            $slug = str_slug("logo_image_of_sagorislam.com");
            //Make unique name for image
            $logoImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $logoImage->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('home')){
                Storage::disk('public')->makeDirectory('home');
            }

            //Delete old image from database
            if (Storage::disk('public')->exists('home/'. $homeUpdate->logo)){
                Storage::disk('public')->delete('home/'. $homeUpdate->logo);
            }

            //Save image and resize image
            $LogoImageResize = Image::make($logoImage)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('home/'.$logoImageName,$LogoImageResize);

            //And save data into the database
            $homeUpdate->logo = $logoImageName;
        }

        //Find form bgImage and storing into a variable
        $image = $request->file('bg_image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->big_text);
            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('home')){
                Storage::disk('public')->makeDirectory('home');
            }

            //Delete old image from database
            if (Storage::disk('public')->exists('home/'. $homeUpdate->bg_image)){
                Storage::disk('public')->delete('home/'. $homeUpdate->bg_image);
            }

            //Save image and resize image
            $imageResize = Image::make($image)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('home/'.$imageName,$imageResize);

            //And save data into the database
            $homeUpdate->bg_image = $imageName;
        }

        $homeUpdate->big_text = $request->big_text;
        $homeUpdate->small_text = $request->small_text;
        $homeUpdate->link = $request->link;
        $homeUpdate->footer_text = $request->footer_text;
        $homeUpdate->footer_link = $request->footer_link;

        //Using implode because of passing array in form fields and if we dont use implode then it show cant convert array to string :)
        $homeUpdate->social_icon = implode(',',$request->social_icon);
        $homeUpdate->social_link = implode(',',$request->social_link);

        $homeUpdate->save();
        return redirect()->route('home.index')->with('success', 'Home Info Updated Successfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeDestroy = Home::findOrfail($id);

        //bg_image delete
        if (Storage::disk('public')->exists('home/'. $homeDestroy->logo)){
            Storage::disk('public')->delete('home/'. $homeDestroy->logo);
        }

        //bg_image delete
        if (Storage::disk('public')->exists('home/'. $homeDestroy->bg_image)){
            Storage::disk('public')->delete('home/'. $homeDestroy->bg_image);
        }

        $homeDestroy->delete();

        return redirect()->route('home.index')->with('success', 'Home content deleted successfully !');
    }
}
