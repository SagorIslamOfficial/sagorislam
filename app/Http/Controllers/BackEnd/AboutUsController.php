<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\Promise\all;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexAbout = AboutUs::latest()->take(1)->get();
        return view('backEnd.about.about-us.index', compact('indexAbout'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.about.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2024',
            'dignity' => 'required',
            'sub_text' => 'nullable',
            'name' => 'required',
            'about_content' => 'required',
            'about_me' => 'nullable',
        ]);

        $aboutUsStore = new AboutUs();

        //Find form bgImage and storing into a variable
        $image = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->dignity);

            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('about-us')){
                Storage::disk('public')->makeDirectory('about-us');
            }

            //Save image and resize image
            $imageResize = Image::make($image)->resize(350, 350)->stream();

            //And now put the image into storage disk
            Storage::disk('public')->put('about-us/'.$imageName,$imageResize);

            //And save data into the database
            $aboutUsStore->image = $imageName;
        }

        $aboutUsStore->dignity = $request->dignity;
        $aboutUsStore->sub_text = $request->sub_text;
        $aboutUsStore->name = implode(',',$request->name);
        $aboutUsStore->about_content = implode(',',$request->about_content);
        $aboutUsStore->about_me = $request->about_me;

        $aboutUsStore->save();

        return redirect()->route('about-us.index')->with('success', 'About Us Info Saved Successfully :)');
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
        $aboutUsEdit = AboutUs::first();
        if (!empty($aboutUsEdit)){
            $nameEdit = explode(',', $aboutUsEdit->name);
            $about_contentEdit = explode(',', $aboutUsEdit->about_content);
        }else{
            $nameEdit = [];
            $about_contentEdit = [];
        }
        return view('backEnd.about.about-us.edit', compact('aboutUsEdit', 'nameEdit', 'about_contentEdit'));
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
            'image' => 'image|mimes:jpeg,jpg,png|max:2024',
            'dignity' => 'required',
            'sub_text' => 'nullable',
            'name' => 'required',
            'about_content' => 'required',
            'about_me' => 'nullable',
        ]);

        $aboutUsUpdate = AboutUs::findOrFail($id);

        //Find form bgImage and storing into a variable
        $image = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->dignity);

            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('about-us')){
                Storage::disk('public')->makeDirectory('about-us');
            }

            //Delete old image from database
            if (Storage::disk('public')->exists('about-us/'. $aboutUsUpdate->image)){
                Storage::disk('public')->delete('about-us/'. $aboutUsUpdate->image);
            }

            //Save image and resize image
            $imageResize = Image::make($image)->resize(350, 350)->stream();

            //And now put the image into storage disk
            Storage::disk('public')->put('about-us/'.$imageName,$imageResize);

            //And save data into the database
            $aboutUsUpdate->image = $imageName;
        }

        $aboutUsUpdate->dignity = $request->dignity;
        $aboutUsUpdate->sub_text = $request->sub_text;

        $aboutUsUpdate->name = implode(',',$request->name);
        $aboutUsUpdate->about_content = implode(',',$request->about_content);

        $aboutUsUpdate->about_me = $request->about_me;

        $aboutUsUpdate->save();

        return redirect()->route('about-us.index')->with('success', 'About Us Info Updated Successfully :)');
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
        $aboutUsDestroy = AboutUs::findOrfail($id);

        if (Storage::disk('public')->exists('about-us/'. $aboutUsDestroy->image)){
            Storage::disk('public')->delete('about-us/'. $aboutUsDestroy->image);
        }

        $aboutUsDestroy->delete();

        return redirect()->route('about-us.index')->with('success', 'About Us content deleted successfully !');
    }
}
