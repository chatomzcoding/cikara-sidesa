<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Info;
use App\Models\Infowebsite;
use App\Models\Kategori;
use App\Models\Kategoriartikel;
use App\Models\Lapak;
use App\Models\Potensi;
use App\Models\Potensisub;
use App\Models\Produk;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Staf;
use Illuminate\Support\Facades\Auth;
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
        $kategori   = Kategori::where('label','lapor')->get();
        $potensi    = Potensi::limit(3)->get();
        $info       = Infowebsite::first();
        $beritaterbaru  = Artikel::orderBy('id','DESC')->first();
        $listberita     = Artikel::where('id','<>',$beritaterbaru->id)->limit(4)->get();
        $berita     = [
            'terbaru' => $beritaterbaru,
            'list' => $listberita
        ];
        $user       = NULL;
        if (isset(Auth::user()->id)) {
            $user = Auth::user();
        }
        $staf   = Staf::limit(4)->get();
        return view('homepage.index', compact('slider','galeri','menu','infodesa','info','berita','potensi','user','kategori','staf'));
    }

    public function potensi($id)
    {
        $potensi    = Potensi::find(Crypt::decryptString($id));
        $sub        = Potensisub::where('potensi_id',$potensi->id)->get();
        $menu       = 'profil';
        // tambahkan view
        $dilihat    = $potensi->dilihat + 1;
        Potensi::where('id',$potensi->id)->update([
            'dilihat' => $dilihat
        ]);
        return view('homepage.desa.potensi', compact('potensi','sub','menu'));
    }

    public function halaman($sesi)
    {
        switch ($sesi) {
            case 'profil':
                $menu   = 'profil';
                $desa   = Profil::first();
                $info   = Infowebsite::first();
                $potensi    = Potensi::all();
                $staf   = Staf::limit(4)->get();
                $tentang = Info::where('label','tentang')->get();
                return view('homepage.profil', compact('menu','desa','info','potensi','staf','tentang'));
                break;
            case 'pasardesa':
                $menu   = 'produk';
                $desa   = Profil::first();
                $info   = Infowebsite::first();
                $produk = Produk::limit(12)->orderBy('id','DESC')->get();
                return view('homepage.pasar', compact('menu','desa','info','produk'));
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
        // tambah view
        $jumlah     = $berita->view + 1;
        Artikel::where('id',$berita->id)->update([
            'view' => $jumlah
        ]);
        return view('homepage.detailberita', compact('menu','berita','kategori','lastberita'));
    }
    public function produkdetail($id)
    {
        $menu       = 'produk';
        $produk     = Produk::find(Crypt::decrypt($id));
        $lapak      = Lapak::find($produk->lapak_id);
        // tambahkan view pada produk
        $dilihat    = $produk->dilihat + 1;
        Produk::where('id',$produk->id)->update([
            'dilihat' => $dilihat
        ]);
        return view('homepage.detailproduk', compact('menu','produk','lapak'));
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

    public function chat($nomor,$pesan)
    {
        $data = [
            // 'number'  => '6281322561697@s.whatsapp.net',
            // "fileName"=> "test.txt",
            "jid"=> "62".$nomor."@s.whatsapp.net",
            // "mimeType" => "string",
            // "url" => "https://yasho.dawalaaa.com/test.txt",
            "message" => $pesan,
        ];
        
        $chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MzQ5NzY2MTAsInVzZXIiOiI2Mjg1MTU2NTMyODQ3In0.wukyywkxXyb_ngxyd-jKlTgC3bn2a_F20dpMBhRIcHE"; 
        // $number = "6285156532847"; // Number
        // $message = "Testing WA untuk Orderan BUMDI"; // Message
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$chatApiToken,
        'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function kirimpesan()
    {
        $nomor  = [81322561697,85317563748,85708475753,82121135161,89663427497,81537456601];
        // $nomor  = [81322561697];
        $pesan  = 'Cek broadcast all crew cikara studio';

        for ($i=0; $i < count($nomor); $i++) { 
            self::chat($nomor[$i],$pesan);
        }
    }
}
