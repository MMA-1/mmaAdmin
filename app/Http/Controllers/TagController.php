<?php

namespace App\Http\Controllers;

use App\Tag;
use App\MmaFunctions;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $tags = Tag::all();
            return view('tags.index')->withTags($tags);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $this->validate($request, array('name' => 'required|max:255', 'slug' => 'required|alpha_dash|min:1|max:50|unique:tags,slug'));
            $tag = new Tag;
            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->type=1;
            $tag->save();
            Session::flash('success', 'New tag was successfully created.');
            return redirect()->route('tags.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $tag = Tag::find($id);
            return view('tags.show')->withTag($tag);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $tag = Tag::find($id);
            return view('tags.edit')->withTag($tag);
        }
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
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $tag = Tag::find($id);
            $this->validate($request, ['name' => 'required|max:255', 'slug' => 'required|alpha_dash|min:1|max:50|unique:tags,slug']);
            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->save();
            Session::flash('success', 'Successfully update your tag!');
            return redirect()->route('tags.show', $tag->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        else {
            $tag = Tag::find($id);
            $tag->posts()->detach();
            $tag->delete();
            Session::flash('success', 'Tag has been successfully deleted.');
            return redirect()->route('tags.index');
        }
    }
}
