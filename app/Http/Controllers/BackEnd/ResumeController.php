<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexResume = Resume::all();
        return view('backEnd.resume.index', compact('indexResume'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.resume.create');
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
            'heading' => 'required',
            'career_position' => 'required',
            'r_time' => 'nullable',
            'place' => 'required',
            'r_content' => 'required'
        ]);

        $storeResume = new Resume();

        $storeResume->heading = $request->heading;
        $storeResume->career_position = implode('|',$request->career_position);
        $storeResume->r_time = implode('|',$request->r_time);
        $storeResume->place = implode('|',$request->place);
        $storeResume->r_content = implode('|',$request->r_content);

        $storeResume->save();

        return redirect()->route('resume.index')->with('success', 'Resume Content Saved Successfully :)');
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
        $resumeEdit = Resume::findOrFail($id);
        if (!empty($resumeEdit)){
            $career_position = explode('|',$resumeEdit->career_position);
            $r_time = explode('|',$resumeEdit->r_time);
            $place = explode('|',$resumeEdit->place);
            $content = explode('|',$resumeEdit->r_content);
        }else{
            $career_position = [];
            $r_time = [];
            $place = [];
            $content = [];
        }
        return view('backEnd.resume.edit', compact('resumeEdit', 'career_position', 'r_time', 'place', 'content'));
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
            'heading' => 'required',
            'career_position' => 'required',
            'r_time' => 'nullable',
            'r_content' => 'required'
        ]);

        $updateResume = Resume::findOrFail($id);

        $updateResume->heading = $request->heading;
        $updateResume->career_position = implode('|',$request->career_position);
        $updateResume->r_time = implode('|',$request->r_time);
        $updateResume->place = implode('|',$request->place);
        $updateResume->r_content = implode('|',$request->r_content);

        $updateResume->save();

        return redirect()->route('resume.index')->with('success', 'Resume Content Updated Successfully :)');
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
        Resume::findOrfail($id)->delete();

        return redirect()->route('resume.index')->with('success', 'Resume Content Deleted successfully !');
    }
}
