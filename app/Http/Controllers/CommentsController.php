<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'store']);
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
            'email'=> 'required|email|max:255',
            'comment'=>'required|min:5|max:2000'
        ));

        $post=Post::find($post_id);
        $comment = new Comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $comment->approved=true;
        $comment->post()->associate($post);
        $comment->isdeleted=false;
        $comment->save();
        Session::flash('success','Comment was added.');
        return redirect()->route('shayari.single', [$post->slug]);
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
        $comment=Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment=Comment::find($id);
        $this->validate($request, array('comment'=>'required'));
        $comment->comment=$request->comment;
        $comment->approved=$request->approved;
        $comment->save();
        Session::flash('success','Comment Updated.');
        return redirect()->route('posts.show',$comment->post->id);
    }
    public function delete($id)
    {
        $comment=Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $post_id=$comment->post->id;
        $comment->isdeleted=true;
        $comment->save();
        Session::flash('success','Comment Deleted.');
        return redirect()->route('posts.show',$post_id);
    }
}
