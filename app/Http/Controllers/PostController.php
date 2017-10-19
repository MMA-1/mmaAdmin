<?php

namespace App\Http\Controllers;

use App\Category;
use App\MmaFunctions;
use App\Tag;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use Mews\Purifier\Purifier;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {

//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        $categories = Category::all();
        $cats = array();
        $cats[''] = 'Select Category';
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $posts = Post::where('isdeleted', false)->orderBy('priority', 'desc')->orderBy('id', 'desc')->paginate(15);
        return view('posts.index')->withPosts($posts)->withCategories($cats);
    }
    public function filter(Request $request)
    {
//dd($request);
        $categories = Category::all();
        $cats = array();
        $cats[''] = 'Select Category';
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $posts = Post::where('isdeleted', false)
            ->where('category_id','=',$request->category_id)
            ->orWhereNull('category_id')
            //->where('title','like','%'.$request->searchsrting.'%')
            ->orderBy('priority', 'desc')->orderBy('id', 'desc')
            ->paginate(15);
        return view('posts.index')->withPosts($posts)->withCategories($cats);
    }

    public function create()
    {
//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();

        return view('posts.create')->withCategories($cats)->withTags($tags);
    }

    public function store(Request $request)
    {
//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        //dd($request);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'metatagvalue' => 'max:255',
            'metatagdescription' => 'max:255'
        ));

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->body = clean($request->body,'youtube');
        $post->metatagvalue = $request->metatagvalue;
        $post->metatagdescription = $request->metatagdescription;
        $post->priority = $request->priority;
        $post->approved = $request->approved;
        $post->viewcount = 0;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $post->image = $filename;
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'The record is saved.');
        return redirect()->route('posts.show', $post->id);

    }

    public function show($id)
    {
//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    public function edit($id)
    {
//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    public function update(Request $request, $id)
    {
//        if(!MmaFunctions::mmaauth12())
//        {
//            return Redirect::back();
//        }
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'category_id' => 'required|integer',
                'body' => 'required',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required',
                'metatagvalue' => 'max:255',
                'metatagdescription' => 'max:255'
            ));
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->body = clean($request->body,'youtube');
        $post->metatagvalue = $request->metatagvalue;
        $post->metatagdescription = $request->metatagdescription;
        $post->priority = $request->priority;
        $post->approved = $request->approved;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $post->image = $filename;
        }
        $post->save();
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'The record is successfully saved.');
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        $post = Post::find($id);
        $post->isdeleted = true;
        $post->save();
        Session::flash('success', 'The record is successfully deleted.');
        return redirect()->route('posts.index');
    }
}
