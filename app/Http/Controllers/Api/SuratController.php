<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Klasifikasisurat;
use App\Models\Penduduksurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function listklasifikasisurat()
    {
        return Klasifikasisurat::all();
    }

    public function listformatsurat()
    {
        $kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : 'semua' ;
        if ($kategori == 'semua') {
            $data     = Formatsurat::all();
        } else {
            $data     = Formatsurat::where('kategori',$kategori)->get();
        }
        $result     = [];
        foreach ($data as $item) {
            if (surataktif($item->kode)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    public function formatsuratbykode($akode)
    {

        $kode       =  format_surat($akode);
        switch ($_GET['versi']) {
            case '1':
                $result     = [];
                foreach (daftarformatsurat() as $row) {
                    $status = 'tidak';
                    foreach ($kode as $key) {
                        if ($row == $key) {
                            $status = 'ya';
                        }
                    }
                    $result[]     = [
                        $row => $status
                    ];
                }
                break;
            case '2':
                $result = [
                    'form' => $kode
                ];
                break;
            case '3':
                $result = [];
                foreach ($kode as $key) {
                    $result[] = [
                        'form' => $key,
                        'label' => nama_label($key,$akode)
                    ];
                }
                break;
            
            default:
                $result = $kode;
                break;
        }
        return $result;
    }

    public function namalabel($label,$kode)
    {
        $result = [
            'label' => nama_label($label,$kode)
        ];
        return $result;
    }

    public function listsuratbyuser($user)
    {
        $data     = DB::table('penduduk_surat')
                        ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                        ->select('penduduk_surat.*','format_surat.nama_surat')
                        ->where('penduduk_surat.user_id',$user)
                        ->orderByDesc('penduduk_surat.id')
                        ->get();
        $result     = [];
        foreach ($data as $item) {
            $dresult    = [];
            foreach ($item as $key => $value) {
                if ($key == 'detail' || $key == 'ttd') {
                    $dresult[$key] = json_decode($value);
                } else {
                    $dresult[$key] = $value;
                }
                
            }
            $result[] = $dresult;
        }
        return $result;
    }

    public function buatsurat(Request $request)
    {
       
        $detail     = [];
        foreach (format_surat($request->kode) as $key) {
            $nilai = [
                $key => $request->$key
            ];

            $detail     = array_merge($detail,$nilai);
        }
        $detail     = json_encode($detail);
        $format     = Formatsurat::find($request->formatsurat_id);
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'nomor_surat' => DbCikara::nomorsurat($format->kode),
            'status' => $request->status,
            'detail' => $detail,
        ]);
        if (response()) {
            $result["success"] = "1";
            $result["message"] = "success";
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
        }

        return $result;
    }
}
