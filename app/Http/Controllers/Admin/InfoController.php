<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Log;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $table = 'info';
    protected $infoteksberjalan = 'teksberjalan';

    public function index()
    {
        switch ($_GET['page']) {
            case 'tentang':
                $menu   = 'tentang';
                $info   = Info::where('label','tentang')->get();
        
                return view('admin.infodesa.tentang.index', compact('menu','info'));
                break;
            case 'teksberjalan':
                $judul  = 'Teks Berjalan';
                $menu   = 'berjalan';
                $info   = Info::where('label','teksberjalan')->get();
                $log    = Log::where('sesi',$this->infoteksberjalan)->orderby('id','DESC')->get();

                return view('admin.pengaturan.teksberjalan.index', compact('menu','info','judul','log'));
                break;
            
            default:
                # code...
                break;
        }

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
        switch ($request->page) {
            case 'tentang':
                $menu   = 'tentang';
                $info   = Info::where('label','tentang')->get();
        
                return view('admin.infodesa.tentang.index', compact('menu','info'));
                break;
            case 'teksberjalan':
                Info::create([
                    'label' => $request->label,
                    'nama' => $request->nama,
                    'detail' => $request->detail,
                ]);
                $info    = Info::where('label',$request->label)->where('nama',$request->nama)->first();
                $data               = [
                    'sesi' => $this->infoteksberjalan,
                    'aksi' => 'tambah',
                    'table_id' => $info->id,
                    'detail' => [
                        'data' => [
                            'tambah data teks berjalan <strong>"'.$request->nama.'"</strong>'
                        ]
                    ]
                ];
                DbCikara::saveLog($data);
                return back()->with('ds','Teks Berjalan');
                break;
            
            default:
                # code...
                break;
        }
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
    public function update(Request $request)
    {
        $info   = Info::find($request->id);
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
            case 'teksberjalan':
                Info::where('id',$request->id)->update([
                    'nama' => $request->nama,
                    'detail' => $request->detail,
                ]);
                $detail     = [
                    'data' => data_perubahan($info,$request,['nama','detail'])
                ];
        
                $data               = [
                    'sesi' => $this->infoteksberjalan,
                    'aksi' => 'edit',
                    'table_id' => $request->id,
                    'detail' => $detail
                ];
                DbCikara::saveLog($data);
                return back()->with('du','Teks Berjalan');
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
        $data               = [
            'sesi' => $this->infoteksberjalan,
            'aksi' => 'hapus',
            'table_id' => $info->id,
            'detail' => [
                'data' => [
                    'hapus data teks berjalan <strong>"'.$info->nama.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);
        $info->delete();

        return back()->with('dd','Teks Berjalan');
    }
}
