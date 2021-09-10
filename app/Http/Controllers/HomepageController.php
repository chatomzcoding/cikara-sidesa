<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Infowebsite;
use App\Models\Kategoriartikel;
use App\Models\Profil;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        $menu       = 'beranda';
        $infodesa   = Profil::first();
        $info       = Infowebsite::first();
        $beritaterbaru  = Artikel::orderBy('id','DESC')->first();
        $listberita     = Artikel::where('id','<>',$beritaterbaru->id)->limit(4)->get();
        $berita     = [
            'terbaru' => $beritaterbaru,
            'list' => $listberita
        ];
        return view('homepage.index', compact('slider','galeri','menu','infodesa','info','berita'));
    }

    public function halaman($sesi)
    {
        switch ($sesi) {
            case 'profil':
                $menu   = 'profil';
                return view('homepage.profil', compact('menu'));
                break;
            
            case 'berita':
                $menu   = 'berita';
                $berita     = Artikel::get();
                return view('homepage.berita', compact('menu','berita'));
                break;

            case 'kontak':
                $menu   = 'kontak';
                // $berita     = Artikel::get();
                $infodesa   = Profil::first();
                $info       = Infowebsite::first();
                return view('homepage.kontak', compact('menu','infodesa','info'));
                break;
            
            default:
                # code...
                break;
        }
    }

    public function detailberita($slug)
    {
        $berita     = Artikel::where('slug',$slug)->first();
        $menu       = 'berita';
        $kategori   = Kategoriartikel::all();
        $lastberita = Artikel::where('id','<>',$berita->id)->orderBy('id','DESC')->limit(5)->get();
        return view('homepage.detailberita', compact('menu','berita','kategori','lastberita'));
    }

    public function kategori($kategori)
    {
        $kategori   = Kategoriartikel::find(Crypt::decryptString($kategori));
        $berita     = Artikel::where('kategoriartikel_id',$kategori->id)->get();
        $menu       = 'berita';
        return view('homepage.beritakategori', compact('kategori','berita','menu'));
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
