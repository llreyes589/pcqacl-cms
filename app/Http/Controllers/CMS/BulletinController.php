<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.index', compact('bulletins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bulletins.create');
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
            'title' => 'required',
            'content' => 'required',
            'featured_photo' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $path = $request->file('featured_photo')->store('bulletins/featured_photo');
        Bulletin::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request['content'],
            'category_id' => $request->category_id,
            'featured_photo' => $path,
        ]);
        return redirect(route('bulletins.index'))->with(['message' => 'Successfully Added']);
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
        $bulletin = Bulletin::find($id);
        return view('bulletins.create', compact('bulletin'));
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
            'title' => 'required',
            'content' => 'required',
            'featured_photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $bulletin = Bulletin::find($id);
        $path = $bulletin->featured_photo;
        if($request->has('featured_photo'))
            $path = $request->file('featured_photo')->store('bulletins/featured_photo');
        $bulletin->update([
            'title' => $request->title,
            'content' => $request['content'],
            'category_id' => $request->category_id,
            'featured_photo' => $path,
        ]);
        return redirect(route('bulletins.index'))->with(['message' => 'Successfully Updated']);
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
