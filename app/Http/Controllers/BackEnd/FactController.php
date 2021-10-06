<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexFact = Fact::all();
        return view('backEnd.about.fact.index', compact('indexFact'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.about.fact.create');
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
            'total' => 'required',
            'name' => 'required'
        ]);

        $factStore = new Fact();

        $factStore->total = implode(',',$request->total);
        $factStore->name = implode(',',$request->name);

        $factStore->save();

        return redirect()->route('fact.index')->with('success', 'Facts Saved Successfully :)');
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
        $factEdit = Fact::first();
        if (!empty($factEdit)){
            $totalEdit = explode(',', $factEdit->total);
            $nameEdit = explode(',', $factEdit->name);
        }else{
            $totalEdit = [];
            $nameEdit = [];
        }
        return view('backEnd.about.fact.edit', compact('factEdit', 'totalEdit', 'nameEdit'));
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
            'total' => 'required',
            'name' => 'required'
        ]);

        $factUpdate = Fact::findOrFail($id);

        $factUpdate->total = implode(',',$request->total);
        $factUpdate->name = implode(',',$request->name);

        $factUpdate->save();

        return redirect()->route('fact.index')->with('success', 'Facts Updated Successfully :)');
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
        Fact::findOrfail($id)->delete();

        return redirect()->route('fact.index')->with('success', 'Facts Deleted successfully !');
    }
}
