<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\MmaFunctions;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('isdeleted', false)->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
        return view('album.index')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cats = array();
        $cats[''] = 'Select Category';
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();

        return view('album.create')->withCategories($cats)->withTags($tags);
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
            'albumtitle' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:albums,slug',
            'category_id' => 'required|integer',
            'album_image' => 'required',
            'metatagvalue' => 'max:255',
            'metatagdescription' => 'max:255'
        ));

        $album = new Album;
        $album->albumtitle = $request->albumtitle;
        $album->slug = $request->slug;
        $album->year = $request->year;
        $album->category_id = $request->category_id;
        $album->subcategory_id = $request->subcategory_id;
        $album->description = clean($request->description,'youtube');
        $album->metatagvalue = $request->metatagvalue;
        $album->metatagdescription = $request->metatagdescription;
        $album->priority = $request->priority;
        $album->approved = $request->approved;
        $album->viewcount = 0;
        if ($request->hasFile('album_image')) {
            $image = $request->file('album_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/albumsimages/' . $filename);
            Image::make($image)->save($location);
            $album->image = $filename;
        }

        $album->save();

        if (isset($request->tags)) {
            $album->tags()->sync($request->tags, false);
        } else {
            $album->tags()->sync(array());
        }

        Session::flash('success', 'The record is saved.');
        return redirect()->route('albums.show', $album->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return view('album.show')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $categories = Category::all();
        $cats = array();
        $cats[''] = 'Select Category';
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('album.edit')->withAlbum($album)->withCategories($cats)->withTags($tags2);
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
        $album = Album::find($id);
        if ($request->input('slug') == $album->slug) {
            $this->validate($request, array(
                'albumtitle' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'category_id' => 'required|integer',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }
        else {
            $this->validate($request, array(
                'albumtitle' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:albums,slug',
                'category_id' => 'required|integer',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }

        $album->albumtitle = $request->albumtitle;
        $album->slug = $request->slug;
        $album->year = $request->year;
        $album->category_id = $request->category_id;
        $album->subcategory_id = $request->subcategory_id;
        $album->description = clean($request->description,'youtube');
        $album->metatagvalue = $request->metatagvalue;
        $album->metatagdescription = $request->metatagdescription;
        $album->priority = $request->priority;
        $album->approved = $request->approved;
        $album->viewcount = 0;
        if ($request->hasFile('album_image')) {
            $image = $request->file('album_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/albumsimages/' . $filename);
            Image::make($image)->save($location);
            $album->image = $filename;
        }

        $album->save();

        if (isset($request->tags)) {
            $album->tags()->sync($request->tags, false);
        } else {
            $album->tags()->sync(array());
        }

        Session::flash('success', 'The record is saved.');
        return redirect()->route('albums.show', $album->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->isdeleted = true;
        $album->save();
        Session::flash('success', 'The record is successfully deleted.');
        return redirect()->route('albums.index');
    }
}
