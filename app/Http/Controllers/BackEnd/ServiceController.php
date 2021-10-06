<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexService = Service::all();
        return view('backEnd.service.index', compact('indexService'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.service.create');
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
            'icon' => 'required',
            'name' => 'required',
            'link' => 'nullable',
            'description' => 'required',
        ]);

        $storeService = new Service();

        $storeService->icon = $request->icon;
        $storeService->name = $request->name;
        $storeService->link = $request->link;
        $storeService->description = $request->description;

        $storeService->save();

        return redirect()->route('service.index')->with('success', 'Service Info Saved Successfully :)');
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
        $editService = Service::findOrFail($id);
        return view('backEnd.service.edit', compact('editService'));
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
            'icon' => 'required',
            'name' => 'required',
            'link' => 'nullable',
            'description' => 'required',
        ]);

        $updateService = Service::findOrFail($id);

        $updateService->icon = $request->icon;
        $updateService->name = $request->name;
        $updateService->link = $request->link;
        $updateService->description = $request->description;

        $updateService->save();

        return redirect()->route('service.index')->with('success', 'Service Info Updated Successfully :)');
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
        Service::findOrFail($id)->delete();

        return redirect()->route('service.index')->with('success', 'Service Info Deleted Successfully :)');
    }
}
