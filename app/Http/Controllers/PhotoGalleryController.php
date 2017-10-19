<?php

namespace App\Http\Controllers;

use App\PhotoGallery;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Image;
use Session;
use App\MmaFunctions;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();
        $tgs = array();
        $tgs[''] = 'Select Tag';
        foreach ($tags as $tg) {
            $tgs[$tg->id] = $tg->name;
        }
        $photogallery = PhotoGallery::where('isdeleted', false)->orderBy('priority', 'desc')->orderBy('id', 'desc')->paginate(15);
        return view('gallery.index')->withPhotogallery($photogallery)->withTags($tgs);
    }


    public function create()
    {
        $tags = Tag::all();

        return view('gallery.create')->withTags($tags);
    }


    public function store(Request $request)
    {
        if (!MmaFunctions::mmaauth12()) {
            return Redirect::back();
        }
        //dd($request);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'featured_image' => 'required',
            'metatagvalue' => 'max:255',
            'metatagdescription' => 'max:255'
        ));

        $photoGallery = new PhotoGallery;
        $photoGallery->title = $request->title;
        $photoGallery->slug = $request->slug;
        $photoGallery->metatagvalue = $request->metatagvalue;
        $photoGallery->metatagdescription = $request->metatagdescription;
        $photoGallery->priority = $request->priority;
        $photoGallery->approved = $request->approved;
        $photoGallery->viewcount = 0;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $photoGallery->imagepath = $filename;


            $photoGallery->save();

            if (isset($request->tags)) {
                $photoGallery->tags()->sync($request->tags, false);
            } else {
                $photoGallery->tags()->sync(array());
            }
            Session::flash('success', 'The record is saved.');
            return redirect()->route('gallery.show', $photoGallery->id);
        }

        Session::flash('error', 'The record is not saved.');
        return view($this);
    }


    public function show($id)
    {
        if (!MmaFunctions::mmaauth12()) {
            return Redirect::back();
        }
        $gallery = PhotoGallery::find($id);
        return view('gallery.show')->withGallery($gallery);
    }

    public function edit($id)
    {
        if (!MmaFunctions::mmaauth12()) {
            return Redirect::back();
        }
        $gallery = PhotoGallery::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('gallery.edit')->withGallery($gallery)->withTags($tags2);
    }

    public function update(Request $request, $id)
    {
        if (!MmaFunctions::mmaauth12()) {
            return Redirect::back();
        }
        $photogallery = PhotoGallery::find($id);
        if ($request->input('slug') == $photogallery->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }

        $photogallery->title = $request->title;
        $photogallery->slug = $request->slug;
        $photogallery->metatagvalue = $request->metatagvalue;
        $photogallery->metatagdescription = $request->metatagdescription;
        $photogallery->priority = $request->priority;
        $photogallery->approved = $request->approved;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $photogallery->imagepath = $filename;
        }
        $photogallery->save();
        if (isset($request->tags)) {
            $photogallery->tags()->sync($request->tags, false);
        } else {
            $photogallery->tags()->sync(array());
        }

        Session::flash('success', 'The record is successfully saved.');
        return redirect()->route('gallery.show', $photogallery->id);
    }


    public function destroy($id)
    {
        if (!MmaFunctions::mmaauth12()) {
            return Redirect::back();
        }
        $gallery = PhotoGallery::find($id);
        $gallery->isdeleted = true;
        $gallery->save();
        Session::flash('success', 'The record is successfully deleted.');
        return redirect()->route('gallery.index');
    }
}
