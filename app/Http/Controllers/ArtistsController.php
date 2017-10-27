<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::where('isdeleted', 0)->get();
       // dd($artists);
        return view('artist.index')->withMma($artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'artistname' => 'required|max:70',
            'slug' => 'required|alpha_dash|min:5|max:70|unique:posts,slug',
            'image' => 'required'
        ));

        //dd($request);
        $artist = new Artist;
        $artist->artistname = $request->artistname;
        $artist->slug = $request->slug;
        $artist->contact = $request->contact;
        $artist->description = $request->description;
        $artist->priority = $request->priority;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/artistsimages/' . $filename);
            Image::make($image)->save($location);
            $artist->image = $filename;
        }

        $artist->save();
        Session::flash('success', 'The record is saved.');
        return redirect()->route('artists.show', $artist->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        return view('artist.show')->withArtist($artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
