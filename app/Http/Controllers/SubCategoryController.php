<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\MmaFunctions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        $subcategories=SubCategory::all();
        $categories = Category::all();
        $cats = array();
        $cats[''] = 'Select Category';
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('subcategories.index')->withSubcategories($subcategories)->withCategories($cats);
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
    public function store(Request $request)
    {
        if(!MmaFunctions::mmaauth12())
        {
            return Redirect::back();
        }
        $this->validate($request,array(
            'name'=>'required|max:255 ',
            'subcategory_slug'=>'required|alpha_dash|max:50|unique:subcategories,subcategory_slug'
        ));
        $subcategory=new SubCategory;
        $subcategory->category_id=$request->category_id;
        $subcategory->name=$request->name;
        $subcategory->subcategory_slug=$request->subcategory_slug;
        $subcategory->priority=5;
        $subcategory->isdeleted=false;
        $subcategory->save();
        Session::flash('success','New SubCategory has been created.');
        return redirect()->route('subcategories.index');
    }
    public function subcategoryAjax($id)
    {
        if($id!=null && $id!='' && $id!=0 ) {
            $subcategories = DB::table("subcategories")
                ->where("category_id", $id)
                ->pluck("name", "id");
        }
        else{
            $subcategories = DB::table("subcategories")
                ->pluck("name", "id");
        }
        //dd($subcategories);
        return json_encode($subcategories);
    }
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
