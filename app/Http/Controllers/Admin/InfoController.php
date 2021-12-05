<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'tentang';
        $info   = Info::where('label','tentang')->get();

        return view('admin.infodesa.tentang.index', compact('menu','info'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        switch ($_GET['page']) {
            case 'tentang':
                $menu   = 'tentang';
                return view('admin.infodesa.tentang.edit', compact('info','menu'));
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        switch ($_GET['page']) {
            case 'tentang':
                $menu   = 'tentang';
                return view('admin.infodesa.tentang.edit', compact('info','menu'));
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        switch ($request->page) {
            case 'tentang':
                if (isset($request->gambar)) {
                    $request->validate([
                        'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
                    ]);
                    // menyimpan data file yang diupload ke variabel $file
                    $file = $request->file('gambar');
                    
                    $nama_file = time()."_".$file->getClientOriginalName();
                    
                    // isi dengan nama folder tempat kemana file diupload
                    $tujuan_upload = 'public/img/pengaturan';
                    $file->move($tujuan_upload,$nama_file);
                } else {
                    $nama_file = $info->gambar;
                }

                Info::where('id',$info->id)->update([
                    'nama' => $request->nama,
                    'detail' => $request->detail,
                    'gambar' => $nama_file,
                ]);
                return redirect('info?page=tentang')->with('du','Info Desa');

                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
