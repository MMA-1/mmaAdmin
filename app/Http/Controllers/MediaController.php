<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\MediaType;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediatypes = MediaType::where('isdeleted', 0)->get();
        $mdtps = array();
        $mdtps[''] = 'Media Type';
        foreach ($mediatypes as $mediatype) {
            $mdtps[$mediatype->id] = $mediatype->medianame;
        }
        $artists = Artist::where('isdeleted', 0)->get();
        $artis = array();
        $artis[''] = 'Select Artist';
        foreach ($artists as $artist) {
            $artis[$artist->id] = $artist->artistname;
        }
        $albums = Album::where('isdeleted', false)->orderBy('id', 'desc')->get();
        $albms = array();
        $albms[''] = 'Select Album';
        foreach ($albums as $album) {
            $albms[$album->id] = $album->albumtitle;
        }

        return view('media.create')->withMediatypes($mdtps)->withArtists($artis)->withAlbums($albms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
