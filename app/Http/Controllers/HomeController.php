<?php

namespace App\Http\Controllers;

use App\Helpers\Cikara\DbCikara;
use App\Models\Forum;
use App\Models\Lapak;
use App\Models\Lapor;
use App\Models\Penduduksurat;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $user   = Auth::user();
        switch ($user->level) {
            case 'admin':
                return view('admin.dashboard');
                break;
            case 'penduduk':
                $lapak  = Lapak::where('user_id',$user->id)->first();
                if ($lapak) {
                    $totalproduk = Produk::where('lapak_id',$lapak->id)->count();
                } else {
                    $totalproduk = 0;
                }
                
                $total = [
                    'laporan' => Lapor::where('user_id',$user->id)->count(),
                    'surat' => Penduduksurat::where('user_id',$user->id)->count(),
                    'produk' => $totalproduk,
                    'forum' => Forum::count(),
                ];
                return view('penduduk.dashboard', compact('total'));
                break;
            
            default:
                # code...
                break;
        }
        return view('dashboard');
    }

    public function tampilan($sesi)
    {
        switch ($sesi) {
            case 'lapor':
                $judul = 'Laporan Penduduk';
                return view('admin.layananmandiri.lapor.index', compact('judul'));
                break;
            case 'lapak':
                $judul  = 'Lapak Desa';
                $total = [
                    'lapak' => Lapak::count(),
                    'produk' => Produk::count(),
                    'transaksi' => 0,
                    'mitra' => 0,
                ];
                $lapak  = Lapak::all();
                return view('admin.layananmandiri.lapak.index',compact('judul','lapak','total'));
                break;
            case 'showlapak':
                $judul  = 'Detail Lapak Ikan Pancing';
                return view('admin.layananmandiri.lapak.show',compact('judul'));
                break;
            case 'forum':
                $judul  = 'Forum';
                return view('admin.layananmandiri.forum.index',compact('judul'));
                break;
            case 'covid':
                $judul  = 'Covid 19';
                return view('admin.layananmandiri.covid',compact('judul'));
                break;
            case 'surat':
                $judul  = 'Permintaan Surat';
                return view('admin.layananmandiri.surat',compact('judul'));
                break;
            case 'penduduk':
                $judul  = 'Penduduk';
                return view('admin.layananmandiri.penduduk',compact('judul'));
                break;
            case 'kk':
                $judul  = 'Kartu Keluarga';
                return view('admin.layananmandiri.kk',compact('judul'));
                break;
            
            default:
                # code...
                break;
        }
    }

    public function ujisurat()
    {
        $file   = 'public/file/surat/surat_ket_usaha.rtf';
        // membaca data dari form
 
        // $nama = $_POST['nama'];
        // $alamat = $_POST['alamat'];
        // $tanggal = $_POST['tanggal'];
        // $waktu = $_POST['waktu'];
        // $tempat = $_POST['tempat'];
        
        // membaca isi dokumen tempate surat.rtf
        // isi dokumen dinyatakan dalam bentuk string
        $namafile   = 'Surat Keterangan Usaha '.tgl_sekarang();
        $document = file_get_contents($file);
        $gambar = file_get_contents($file);

        // dd($document);
        
        // mereplace tanda %%%NAMA% dengan data nama dari form
        $document = str_replace("[nama]", 'Firman Setiawan', $document);
        
        // mereplace tanda %%%ALAMAT% dengan data alamat dari form, dst
        $document = str_replace("[judul_surat]", 'Surat Keterangan Usaha', $document);
        
        // $document = str_replace("%%TGL%%", $tanggal, $document);
        // $document = str_replace("%%TEMPAT%%", $tempat, $document);
        // $document = str_replace("%%WAKTU%%", $waktu, $document);
        
        // header untuk membuka file output RTF dengan MS. Word
        // nama file output adalah undangan.rtf
        
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=".$namafile.".rtf");
        header("Content-length: " . strlen($document));
        echo $document;
 
    }
}
