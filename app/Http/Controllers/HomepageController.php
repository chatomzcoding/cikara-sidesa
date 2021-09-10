<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Kategoriartikel;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('visitorhits');
    }
    
    public function index()
    {
        $slider     = Slider::where('status','aktif')->get();
        $galeri     = Galeri::where('status','aktif')->limit(6)->get();
        return view('homepage.index', compact('slider','galeri'));
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
