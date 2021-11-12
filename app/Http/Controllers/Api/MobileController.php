<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Forum;
use App\Models\Kategori;
use App\Models\Lapak;
use App\Models\Lapor;
use App\Models\Penduduk;
use App\Models\Pendudukaduan;
use App\Models\Penduduksurat;
use App\Models\Produk;
use App\Models\User;
use App\Models\Userakses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    // detail lapak per user
    public function lapakByUser($user_id)
    {
        return Lapak::where('user_id',$user_id)->first();
    }

    public function listuser()
    {
        $token = $_GET['token'];
        if (cektoken($token)) {
            return User::where('level','penduduk')->get();
        } else {
            return response()->json('akses dilarang');
        }
        
    }

    public function kategori($sesi)
    {
        switch ($sesi) {
            case 'laporan':
                $result = Kategori::where('label','lapor')->get();
                break;
            
            default:
                $result = NULL;
                break;
        }

        return $result;
    }

    public function listartikel()
    {
        return Artikel::all();
    }

    public function dashboarduser($sesi,$user)
    {
        switch ($sesi) {
            case 'lapor':
                $result  = [
                    'total' => Lapor::where('user_id',$user)->count(),
                    'selesai' => Lapor::where('user_id',$user)->where('status','selesai')->count(),
                    'proses' => Lapor::where('user_id',$user)->where('status','proses')->count(),
                    'menunggu' => Lapor::where('user_id',$user)->where('status','menunggu')->count(),
                ];

                break;
            case 'surat':
                $surat  = DB::table('penduduk_surat')
                ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                ->select('penduduk_surat.*','format_surat.nama_surat','format_surat.file_surat')
                ->where('user_id',$user)
                ->orderByDesc('id')
                ->get();
                $result  = [
                    'total' => count($surat),
                    'selesai' => Penduduksurat::where('user_id',$user)->where('status','selesai')->count(),
                    'proses' => Penduduksurat::where('user_id',$user)->where('status','proses')->count(),
                    'menunggu' => Penduduksurat::where('user_id',$user)->where('status','menunggu')->count(),
                ];
                break;
            case 'home':
                $lapak  = Lapak::where('user_id',$user)->first();
                if ($lapak) {
                    $totalproduk = Produk::where('lapak_id',$lapak->id)->count();
                } else {
                    $totalproduk = 0;
                }
                $result = [
                    'laporan' => Lapor::where('user_id',$user)->count(),
                    'surat' => Penduduksurat::where('user_id',$user)->count(),
                    'produk' => $totalproduk,
                    'forum' => Forum::count(),
                ];
                break;
            
            default:
                # code...
                break;
        }

        return $result;
    }

    public function persentasependuduk()
    {
        $token  = $_GET['token'];
        if (cektoken($token)) {
            $user   = $_GET['user'];
            $akses  = Userakses::where('user_id',$user)->first();
            $penduduk   = Penduduk::find($akses->penduduk_id);
            return nilai_kelengkapan($penduduk);
        } else {
            return response()->json('akses dilarang');
        }
    }

    public function laporankesalahan(Request $request)
    {
        $token  = $request->token;
        if (cektoken($token)) {
            Pendudukaduan::create($request->all());
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
        } else {
            return response()->json('akses dilarang');
        }
    }
    public function editphoto(Request $request)
    {
        $token  = $request->token;
        if (cektoken($token)) {
            $namafile = uploadgambar($request,'user');
            User::where('id',$request->user_id)->update([
                'profile_photo_path' => $namafile
            ]);

            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
            return $result;
        } else {
            return response()->json('akses dilarang');
        }
    }

    public function likelaporan(Request $request)
    {
        $token  = $request->token;
        if (cektoken($token)) {
            $lapor  = Lapor::find($request->id);
            $like   = $lapor->datalike;
            $datalike   = [
                [
                    'id' => $request->user_id,
                ]
            ];
            if (!is_null($like) || !empty($like)) {
                $like       = json_decode($like);
                $datalike   = array_merge($like,$datalike);
            }
            Lapor::where('id',$request->id)->update([
                'datalike' => json_encode($datalike)
            ]);
            $result["success"] = "1";
            $result["message"] = "success";
            return $result;
        } else {
            return response()->json('akses dilarang');
        }
    }
}
