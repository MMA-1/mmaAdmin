<?php

namespace App\Http\Controllers;

use App\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicPhotoGalleryController extends Controller
{
    public function frontgallery()
    {
        $photogallery = PhotoGallery::where('isdeleted', false)->where('approved',1)->orderBy('priority', 'desc')->orderBy('id', 'desc')->paginate(12);
        return view('shayari.listgallery')->withPhotogallery($photogallery);
    }
    public function showimage($slug)
    {
        $galleryimage= PhotoGallery::where('slug','=',$slug)->where('isdeleted', false)->where('approved',1)->first();
        //dd($galleryimage);
        DB::table('photo_galleries')
            ->where('slug', $slug)
            ->update([
                'viewcount' => DB::raw('viewcount + 1')
            ]);

        return view('shayari.imageshayari')->withGalleryimage($galleryimage);
    }
}
