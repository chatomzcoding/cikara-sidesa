<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Info;
use App\Models\Infowebsite;
use App\Models\Kategori;
use App\Models\Kategoriartikel;
use App\Models\Lapak;
use App\Models\Penduduk;
use App\Models\Potensi;
use App\Models\Potensisub;
use App\Models\Produk;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Staf;
use App\Models\Userakses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

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
        $kategori   = Kategori::where('label','lapor')->orderBy('nama_kategori','ASC')->get();
        $potensi    = Potensi::limit(3)->get();
        $info       = Infowebsite::first();
        $beritaterbaru  = Artikel::orderBy('id','DESC')->first();
        $listberita     = Artikel::where('id','<>',$beritaterbaru->id)->limit(4)->get();
        $kategoriartikel = Kategoriartikel::where('nama_kategori','Kegiatan Desa')->first();
        if ($kategoriartikel) {
            $beritadesa     = Artikel::where('kategoriartikel_id',$kategoriartikel->id)->limit(3)->get();
        } else {
            $beritadesa     = [];
        }

        $berita     = [
            'terbaru' => $beritaterbaru,
            'list' => $listberita
        ];
        $user       = NULL;
        if (isset(Auth::user()->id)) {
            $user = Auth::user();
        }
        $staf   = Staf::limit(4)->get();
        return view('homepage.index', compact('slider','galeri','menu','infodesa','info','berita','potensi','user','kategori','staf','beritadesa'));
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
        $datapokok = Infowebsite::first();
        switch ($sesi) {
            case 'profil':
                $menu   = 'profil';
                $desa   = Profil::first();
                $info   = Infowebsite::first();
                $potensi    = Potensi::all();
                $staf   = Staf::limit(4)->get();
                $tentang = Info::where('label','tentang')->get();
                return view('homepage.profil', compact('menu','desa','info','potensi','staf','tentang','datapokok'));
                break;
            case 'pasardesa':
                $menu   = 'produk';
                $desa   = Profil::first();
                $info   = Infowebsite::first();
                // $produk = Produk::limit(12)->orderBy('id','DESC')->get();
                $produk = DB::table('produk')
                            ->join('lapak','produk.lapak_id','=','lapak.id')
                            ->select('produk.*','lapak.nama_lapak')
                            ->limit(18)
                            ->orderByDesc('produk.id')
                            ->get();
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
        $user       = Auth::user();
        $berita     = Artikel::where('slug',$slug)->first();
        $menu       = 'berita';
        $kategori   = Kategoriartikel::orderby('nama_kategori','ASC')->get();
        $lastberita = Artikel::where('id','<>',$berita->id)->orderBy('id','DESC')->limit(5)->get();
        // tambah view
        $jumlah     = $berita->view + 1;
        Artikel::where('id',$berita->id)->update([
            'view' => $jumlah
        ]);
        // komentar
        if (!is_null($berita->komentar)) {
            $komentar   = json_decode($berita->komentar);
        } else {
            $komentar   = [];
        }
        $penduduk   = [];
        if ($user) {
            if ($user->level == 'penduduk') {
                $akses  = Userakses::where('user_id',$user->id)->first();
                $penduduk   = Penduduk::find($akses->penduduk_id);
            }   
        }
        $dkategori  = Kategoriartikel::find($berita->kategoriartikel_id);
        return view('homepage.detailberita', compact('menu','berita','kategori','lastberita','komentar','penduduk','user','dkategori'));
    }

    public function kirimkomentar(Request $request)
    {
        $artikel    = Artikel::find($request->id);
        $komentar   = [
            [
                'nama' => $request->name,
                'isi' => $request->isi,
                'photo' => $request->photo,
                'tanggal' => tgl_sekarang(),
                'waktu' =>jam_sekarang()
            ]
        ];
        if (!is_null($artikel->komentar)) {
            $dkomentar  = json_decode($artikel->komentar,TRUE);
            $komentar   = array_merge($dkomentar,$komentar);
        }

        Artikel::where('id',$request->id)->update([
            'komentar' => json_encode($komentar)
        ]);

        return back()->with('succesalert','Komentar telah terkirim');
        
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
        $akses      = Userakses::where('user_id',$lapak->user_id)->first();
        $penduduk   = Penduduk::find($akses->penduduk_id);
        $produklainnya  = Produk::where('lapak_id',$lapak->id)->get();
        return view('homepage.detailproduk', compact('menu','produk','lapak','produklainnya','penduduk'));
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
        $kategori   = Kategoriartikel::orderBy('nama_kategori','ASC')->get();
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
