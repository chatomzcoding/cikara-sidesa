<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategoriartikel;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status','aktif')->get();
        return view('homepage.index', compact('slider'));
    }

    public function artikel()
    {
        $artikel    = Artikel::all();
        $kategori   = Kategoriartikel::all();
        return view('homepage.artikel.index', compact('artikel','kategori'));
    }
    public function showartikel($slug)
    {
        $artikel    = Artikel::where('slug',$slug)->first();
        // tambah view
        $view       = $artikel->view + 1;
        Artikel::where('id',$artikel->id)->update([
            'view' => $view
        ]);
        $kategori   = Kategoriartikel::all();
        return view('homepage.artikel.show', compact('artikel','kategori'));
    }
}
