<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Media;
use App\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $media = Media::where('isdeleted', false)->orderBy('album_id', 'desc')->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
        return view('media.index')->withMedia($media);
    }

    public function create()
    {
        $mediatypes = MediaType::where('isdeleted', 0)->get();
        $mdtps = array();
        $mdtps[''] = 'Select Media Type';
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

    public function store(Request $request)
    {
        $this->validate($request, array(
            'mediatitle' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:media,slug',
            'mediatype_id' => 'required|integer',
            'artist_id' => 'required|integer',
            'album_id' => 'required|integer',
            'mediaurl' => 'required|max:255',
            'metatagvalue' => 'max:255',
            'metatagdescription' => 'max:255'
        ));

        $media = new Media;
        $media->mediatitle = $request->mediatitle;
        $media->slug = $request->slug;
        $media->mediatype_id = $request->mediatype_id;
        $media->artist_id = $request->artist_id;
        $media->album_id = $request->album_id;
        $media->mediaurl = $request->mediaurl;
        $media->description = clean($request->description,'youtube');
        $media->metatagvalue = $request->metatagvalue;
        $media->metatagdescription = $request->metatagdescription;
        $media->priority = $request->priority;
        $media->addedby = Auth::user()->id;
        $media->viewcount = 0;


        $media->save();

        Session::flash('success', 'The record is saved.');
        return redirect()->route('media.show', $media->id);
    }

    public function show($id)
    {
        $media = Media::find($id);
        return view('media.show')->withMedia($media);
    }

    public function edit($id)
    {
        $mediatypes = MediaType::where('isdeleted', 0)->get();
        $mdtps = array();
        $mdtps[''] = 'Select Media Type';
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
        $media = Media::find($id);
        return view('media.edit')->withMedia($media)->withMediatypes($mdtps)->withArtists($artis)->withAlbums($albms);
    }

    public function update(Request $request, $id)
    {
        $media = Media::find($id);
        if ($request->input('slug') == $media->slug) {
            $this->validate($request, array(
                'mediatitle' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'mediatype_id' => 'required|integer',
                'artist_id' => 'required|integer',
                'album_id' => 'required|integer',
                'mediaurl' => 'required|max:255',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }
        else{
            $this->validate($request, array(
                'mediatitle' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:media,slug',
                'mediatype_id' => 'required|integer',
                'artist_id' => 'required|integer',
                'album_id' => 'required|integer',
                'mediaurl' => 'required|max:255',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }



        $media->mediatitle = $request->mediatitle;
        $media->slug = $request->slug;
        $media->mediatype_id = $request->mediatype_id;
        $media->artist_id = $request->artist_id;
        $media->album_id = $request->album_id;
        $media->mediaurl = $request->mediaurl;
        $media->description = clean($request->description,'youtube');
        $media->metatagvalue = $request->metatagvalue;
        $media->metatagdescription = $request->metatagdescription;
        $media->priority = $request->priority;
        $media->updatedby = Auth::user()->id;
        $media->viewcount = 0;


        $media->save();

        Session::flash('success', 'The record is saved.');
        return redirect()->route('media.show', $media->id);
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        $media->isdeleted = true;
        $media->updatedby = Auth::user()->id;
        $media->save();
        Session::flash('success', 'The record is successfully deleted.');
        return redirect()->route('media.index');
    }
}
