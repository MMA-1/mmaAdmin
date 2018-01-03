<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Category;
use App\MediaType;
use App\SubCategory;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function category()
    {
        $categories=Category::all();
        //dd($categories);
        return $categories;
    }

    public function mediatypes()
    {
        $mediatype = MediaType::where('isdeleted', 0)->get();
        return $mediatype;
    }
    public function albums()
    {
        $albums = Album::where('isdeleted', false)->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
        return $albums;
    }
    public function artists()
    {
        $artists = Artist::where('isdeleted', 0)->get();
        return $artists;
    }
    public function subcategory()
    {
        $subcategories = SubCategory::where('isdeleted', 0)->get();
        return $subcategories;
    }
}
