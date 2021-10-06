<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Heading;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexHeading = Heading::all();
        return view('backEnd.headings.index', compact('indexHeading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.headings.create');
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
            'about_heading' => 'required',
            'about_sub_text' => 'required',
            'skill_heading' => 'required',
            'skill_sub_text' => 'required',
            'fact_heading' => 'required',
            'fact_sub_text' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_sub_text' => 'required',
            'resume_heading' => 'required',
            'resume_sub_text' => 'required',
            'service_heading' => 'required',
            'service_sub_text' => 'required',
            'portfolio_heading' => 'required',
            'portfolio_sub_text' => 'required',
            'contact_heading' => 'required',
            'contact_sub_text' => 'required'
        ]);

        $headingStore = new Heading();

        $headingStore->about_heading = $request->about_heading;
        $headingStore->about_sub_text = $request->about_sub_text;
        $headingStore->skill_heading = $request->skill_heading;
        $headingStore->skill_sub_text = $request->skill_sub_text;
        $headingStore->fact_heading = $request->fact_heading;
        $headingStore->fact_sub_text = $request->fact_sub_text;
        $headingStore->testimonial_heading = $request->testimonial_heading;
        $headingStore->testimonial_sub_text = $request->testimonial_sub_text;
        $headingStore->resume_heading = $request->resume_heading;
        $headingStore->resume_sub_text = $request->resume_sub_text;
        $headingStore->service_heading = $request->service_heading;
        $headingStore->service_sub_text = $request->service_sub_text;
        $headingStore->portfolio_heading = $request->portfolio_heading;
        $headingStore->portfolio_sub_text = $request->portfolio_sub_text;
        $headingStore->contact_heading = $request->contact_heading;
        $headingStore->contact_sub_text = $request->contact_sub_text;

        $headingStore->save();

        return redirect()->route('headings.index')->with('success', 'Heading Info Saved Successfully :)');
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
        $headingEdit = Heading::findOrFail($id);
        return view('backEnd.headings.edit',compact('headingEdit'));
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
            'about_heading' => 'required',
            'about_sub_text' => 'required',
            'skill_heading' => 'required',
            'skill_sub_text' => 'required',
            'fact_heading' => 'required',
            'fact_sub_text' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_sub_text' => 'required',
            'resume_heading' => 'required',
            'resume_sub_text' => 'required',
            'service_heading' => 'required',
            'service_sub_text' => 'required',
            'portfolio_heading' => 'required',
            'portfolio_sub_text' => 'required',
            'contact_heading' => 'required',
            'contact_sub_text' => 'required'
        ]);

        $headingUpdate = Heading::findOrFail($id);

        $headingUpdate->about_heading = $request->about_heading;
        $headingUpdate->about_sub_text = $request->about_sub_text;
        $headingUpdate->skill_heading = $request->skill_heading;
        $headingUpdate->skill_sub_text = $request->skill_sub_text;
        $headingUpdate->fact_heading = $request->fact_heading;
        $headingUpdate->fact_sub_text = $request->fact_sub_text;
        $headingUpdate->testimonial_heading = $request->testimonial_heading;
        $headingUpdate->testimonial_sub_text = $request->testimonial_sub_text;
        $headingUpdate->resume_heading = $request->resume_heading;
        $headingUpdate->resume_sub_text = $request->resume_sub_text;
        $headingUpdate->service_heading = $request->service_heading;
        $headingUpdate->service_sub_text = $request->service_sub_text;
        $headingUpdate->portfolio_heading = $request->portfolio_heading;
        $headingUpdate->portfolio_sub_text = $request->portfolio_sub_text;
        $headingUpdate->contact_heading = $request->contact_heading;
        $headingUpdate->contact_sub_text = $request->contact_sub_text;

        $headingUpdate->save();

        return redirect()->route('headings.index')->with('success', 'Heading Info updated Successfully :)');
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
        Heading::findOrFail($id)->delete();
        return redirect()->route('headings.index')->with('success', 'Heading Info Deleted Successfully :)');
    }
}
