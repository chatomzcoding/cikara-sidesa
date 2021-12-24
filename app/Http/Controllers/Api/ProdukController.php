<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapak;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/penduduk/produk';

    public function index()
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        $produk =  Produk::orderBy('id','DESC')->get();
        $result = [];
        foreach ($produk as $key) {
            $result[] = [
                'link' => 'produkdesa/'.Crypt::encryptString($key->id),
                'data' => $key
            ];
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request->token;
        if (cektoken($token)) {
            $namafile   = uploadgambar($request,'penduduk/produk');
            $produk = New Produk;
            $produk->lapak_id = $request->lapak_id;
            $produk->nama = $request->nama;
            $produk->keterangan = $request->keterangan;
            $produk->gambar = $namafile;
            $produk->harga = $request->harga;
            $produk->dilihat = $request->dilihat;
    
            $produk->save();
    
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
            # code...
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
        

    //     return response()->json('Program deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($produk)
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        return Produk::find($produk);
        
    }
    public function produklapak($userid)
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        $lapak  = Lapak::where('user_id',$userid)->first();
        if ($lapak) {
            return Produk::where('lapak_id',$lapak->id)->orderBy('id','DESC')->get();
        } else {
            return response()->json('belum ada lapak');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produk)
    {
        $token = $request->token;
        if (cektoken($token)) {
            $namafile   = uploadgambar($request,'penduduk/produk');
            $produk = Produk::find($produk);
            deletefile('public/img/penduduk/produk/'.$produk->gambar);
            $produk->nama = $request->nama;
            $produk->keterangan = $request->keterangan;
            $produk->gambar = $namafile;
            $produk->harga = $request->harga;
    
            $produk->save();
    
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
            # code...
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($produk)
    {
        $token = $_GET['token'];
        if (cektoken($token)) {
            $produk = Produk::find($produk);
            if ($produk) {
                deletefile($this->folder.'/'.$produk->gambar);
                $produk->delete();
                $result["success"] = "1";
                $result["message"] = "success";
                return $result;
            } else {
                $result["success"] = "0";
                $result["message"] = "data tidak ada";
                return $result;
            }
        } else {
            return response()->json('Access Denide');
        }
    }
}
