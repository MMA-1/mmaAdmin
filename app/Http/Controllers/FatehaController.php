<?php

namespace App\Http\Controllers;

use App\Fateha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FatehaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $fateha = Fateha::where('isdeleted', false)->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
        return view('fateha.index')->withFateha($fateha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fateha.create');
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
            'message' => 'required|max:255'
        ));

        $fateha = new Fateha;
        $fateha->message = $request->message;
        $fateha->description = $request->description;
        $fateha->expiration = $request->expiration;
        $fateha->priority = $request->priority;
        $fateha->addedby =Auth::user()->id;
        $fateha->save();

        Session::flash('success', 'The record is saved.');
        return redirect()->route('fateha.show', $fateha->id);
    }
    public function show($id)
    {
        $fateha = Fateha::find($id);
        return view('fateha.show')->withFateha($fateha);
    }
    public function edit($id)
    {
        $fateha = Fateha::find($id);

        return view('fateha.edit')->withFateha($fateha);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'message' => 'required|max:255'
        ));
        $fateha = Fateha::find($id);
        $fateha->message = $request->message;
        $fateha->description = $request->description;
        $fateha->expiration = $request->expiration;
        $fateha->priority = $request->priority;
        $fateha->updatedby =Auth::user()->id;
        $fateha->save();

        Session::flash('success', 'The record is saved.');
        return redirect()->route('fateha.show', $fateha->id);
    }

    public function destroy($id)
    {
        $fateha = Fateha::find($id);
        $fateha->isdeleted = true;
        $fateha->save();
        Session::flash('success', 'The record is successfully deleted.');
        return redirect()->route('fateha.index');
    }
}
