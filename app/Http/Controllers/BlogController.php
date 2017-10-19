<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use DB;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BlogController extends Controller
{
    public function __construct()
    {
        Artisan::call('view:clear');

    }
    public function getSelected($categoryid,$categorynotinids,$number)
    {
        $query= DB::table('posts')->select('id','title', 'viewcount','slug','image')->where('isdeleted', false)->where('approved',1)->orderBy('viewcount','desc')->take($number);
        if ($categoryid) {
            $query->where('category_id', $categoryid);
        }
        if ($categorynotinids) {
            $query->whereNotIn('category_id', $categorynotinids);
        }
        $posts=$query->get();
        //dd($posts);
        return $posts;
    }

    public function getIndex()
    {
        $posts=Post::where('isdeleted', false)->where('approved',1)->orderBy('priority', 'desc')->orderBy('id','desc')-> paginate(5);
        //dd($posts);
        return view('shayari.index')->withPosts($posts);
    }
    public function getShayeriForHome()
    {
        $posts=Post::where('isdeleted', false)->where('approved',1)->whereNotIn('category_id', [5])->orderBy('priority', 'desc')->orderBy('id','desc')-> paginate(10);
        //dd($posts);
        return view('shayari.index')->withPosts($posts);
    }
    public function getDataShayarwise($slug)
    {
        $categories=Category::where('category_slug',$slug)->first();

        $posts=Post::where('category_id',$categories->id)->where('isdeleted', false)->where('approved',1)->orderBy('priority', 'desc')->orderBy('id','desc')-> paginate(10);
        // dd($posts);
        return view('shayari.postlist')->withPosts($posts)->withCategory($categories->name);
    }
    public function getDataTagwise($slug)
    {
        $tag=Tag::where('slug',$slug)->first();
        $posts = DB::table('post_tag')
            ->leftJoin('posts', 'post_tag.post_id', '=', 'posts.id')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->where('post_tag.tag_id',$tag->id)->orderBy('post_tag.post_id','desc')
            ->paginate(10);
        //dd($posts);
        return view('shayari.tagpostlist')->withPosts($posts)->withTag($tag->name);
    }
    public function getDataTag2($slug)
    {
        $tag=Tag::where('slug',$slug)->first();
        $posts = DB::table('post_tag')
            ->leftJoin('posts', 'post_tag.post_id', '=', 'posts.id')
            ->where('post_tag.tag_id',$tag->id)->orderBy('post_tag.post_id','desc')
            ->paginate(10);
        return view('shayari.tagpostlist')->withPosts($posts)->withTag($tag->name);
    }

    public function getSingle($slug)
    {
        $post= Post::where('slug','=',$slug)->where('isdeleted', false)->where('approved',1)->first();
        DB::table('posts')
            ->where('slug', $slug)
            ->update([
                'viewcount' => DB::raw('viewcount + 1')
            ]);

        return view('shayari.single')->withPost($post);
    }

}
