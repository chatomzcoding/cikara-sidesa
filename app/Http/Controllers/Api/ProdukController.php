<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapak;
use App\Models\Produk;
use Illuminate\Http\Request;

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
        return Produk::all();
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
            $produk = New Produk;
            $produk->lapak_id = $request->lapak_id;
            $produk->nama = $request->nama;
            $produk->keterangan = $request->keterangan;
            $produk->gambar = $request->gambar;
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
        return Produk::find($produk);
        
    }
    public function produklapak($userid)
    {
        $lapak  = Lapak::where('user_id',$userid)->first();
        if ($lapak) {
            return Produk::where('lapak_id',$lapak->id)->get();
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
            $produk = Produk::find($produk);
            $produk->lapak_id = $request->lapak_id;
            $produk->nama = $request->nama;
            $produk->keterangan = $request->keterangan;
            $produk->gambar = $request->gambar;
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
    public function destroy($produk, Request $request)
    {
        $token = $request->token;
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
                $result["message"] = "error";
                return $result;
            }
        } else {
            return response()->json('Access Denide');
        }

    }
}
