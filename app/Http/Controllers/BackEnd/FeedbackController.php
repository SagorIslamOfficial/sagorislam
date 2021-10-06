<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $feedbackIndex = Feedback::all();
        return view('backEnd.about.feedback.index', compact('feedbackIndex'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.about.feedback.create');
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
            'name' => 'required',
            'dignity' => 'required',
            'message' => 'required',
        ]);

        $feedbackStore = new Feedback();

        //Find form bgImage and storing into a variable
        $image = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->name);

            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('feedback')){
                Storage::disk('public')->makeDirectory('feedback');
            }

            //Save image and resize image
            $imageResize = Image::make($image)->resize(112, 112)->stream();

            //And now put the image into storage disk
            Storage::disk('public')->put('feedback/'.$imageName,$imageResize);

            //And save data into the database
            $feedbackStore->image = $imageName;
        }

        $feedbackStore->name = $request->name;
        $feedbackStore->dignity = $request->dignity;
        $feedbackStore->message = $request->message;

        $feedbackStore->save();

        return redirect()->route('feedback.index')->with('success', 'Feedback Saved Successfully :)');
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
        $feedbackEdit = Feedback::findOrFail($id);
        return view('backEnd.about.feedback.edit', compact('feedbackEdit'));
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2024',
            'name' => 'required',
            'dignity' => 'required',
            'message' => 'required',
        ]);

        $feedbackUpdate = Feedback::findOrFail($id);

        //Find form bgImage and storing into a variable
        $image = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($image)){
            //Creating image slug
            $slug = str_slug($request->name);

            //Make unique name for image
            $imageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $image->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('feedback')){
                Storage::disk('public')->makeDirectory('feedback');
            }

            //Delete old image from database
            if (Storage::disk('public')->exists('feedback/'. $feedbackUpdate->image)){
                Storage::disk('public')->delete('feedback/'. $feedbackUpdate->image);
            }

            //Save image and resize image
            $imageResize = Image::make($image)->resize(112, 112)->stream();

            //And now put the image into storage disk
            Storage::disk('public')->put('feedback/'.$imageName,$imageResize);

            //And save data into the database
            $feedbackUpdate->image = $imageName;
        }

        $feedbackUpdate->name = $request->name;
        $feedbackUpdate->dignity = $request->dignity;
        $feedbackUpdate->message = $request->message;

        $feedbackUpdate->save();

        return redirect()->route('feedback.index')->with('success', 'Feedback Updated Successfully :)');
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
        $feedbackDestroy = Feedback::findOrfail($id);

        if (Storage::disk('public')->exists('feedback/'. $feedbackDestroy->image)){
            Storage::disk('public')->delete('feedback/'. $feedbackDestroy->image);
        }

        $feedbackDestroy->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback Deleted successfully !');
    }
}
