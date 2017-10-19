<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['store','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.message');
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
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required|max:50',
            'email'=> 'required|email|max:90',
            'contact'=>'required|min:5|max:20',
            'message'=>'required|min:5|max:500'
        ));

        $message = new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->contact=$request->contact;
        $message->message=$request->message;
        $message->save();
        $data=array(
            'name'=>$message->name,
        'email'=>$message->email,
        'contact'=>$message->contact,
        'message1'=>$message->message,
        );
        Mail::send('emails.contact',$data,function ($msg) use($data){
$msg->from($data['email']);
//$msg->reply_to();
$msg->to('mmaitsolutions14@gmail.com');
$msg->subject('Contact message');
        });
        Session::flash('success','Message was sent.');
        return redirect()->route('message.index');
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
