<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use App\Models\OfficerYear;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = OfficerYear::select(['id', 'year as label'])->get();
        $officers = Officer::all();
        return view('officers.index', compact('officers', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'display_file' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $path = $request->file('display_file')->store('officers/display_photo');
        $request->merge(['display_photo' => $path]);
        Officer::create($request->except(['_token', 'display_file']));
        return redirect(route('officers.index'))->with(['message' => 'Successfully Added']);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $years = OfficerYear::select(['id', 'year as label'])->get();
        $officers = Officer::all();
        $officer = Officer::find($id);
        return view('officers.index', compact("officer", 'years', 'officers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'display_file' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $officer = Officer::find($id);
        $path = $officer->display_photo;
        if($request->has('display_file'))
            $path = $request->file('display_file')->store('officers/display_photo');
        $request->merge(['display_photo' => $path]);
        $officer->update($request->except(['_token', 'display_file', '_method']));
        return redirect(route('officers.index'))->with(['message' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
