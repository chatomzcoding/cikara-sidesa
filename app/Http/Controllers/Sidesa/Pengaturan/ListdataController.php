<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Listdata;
use Illuminate\Http\Request;

class ListdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'listdata';
        $sesi   = (isset($_GET['sesi'])) ? $_GET['sesi'] : 'pekerjaan' ;
        $listdata   = Listdata::where('label',$sesi)->orderBy('nama','ASC')->get();
        $filter     = [
            'sesi' => $sesi
        ];
        // sesi untuk format surat
        if ($sesi == 'formatsurat') {
            $listdata   = Listdata::where('label','format_surat')->orderBy('nama','ASC')->get();
            return view('admin.pengaturan.listdata.formatsurat', compact('menu','listdata'));
        } else {
            return view('admin.pengaturan.listdata.index', compact('menu','listdata','filter'));
        }
    }

    public static function importmanual()
    {
        $list   = list_penolongkelahiran();

        $label  = 'penolong kelahiran';
        foreach ($list as $item) {
            $nama   = strtolower($item);
            // cek jika sudah ada jangan ditambahkan
            $ceklist    = Listdata::where('label',$label)->where('nama',$nama)->first();
            if (!$ceklist) {
                Listdata::create([
                    'label' => $label,
                    'nama' => $nama
                ]);
            }
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
        Listdata::create([
            'label' => $request->label,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('ds','List Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function show(Listdata $listdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function edit($listdata)
    {
        $listdata   = Listdata::find($listdata);
        $menu       = '';
        $keterangan = json_decode($listdata->keterangan);
        return view('admin.pengaturan.listdata.edit', compact('menu','listdata','keterangan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request->formatsurat)) {
            $keterangan = $request->keterangan;
            $keterangan = explode('@',$keterangan);
            $list       = [];
            foreach ($keterangan as $key) {
                $dkey    = trim($key);
                $dkey    = explode('|',$dkey);
                $list[]  = [
                    'key' => trim($dkey[0]),
                    'label' => trim($dkey[1])
                ];
            }
            Listdata::where('id',$request->id)->update([
                'nama' => $request->nama,
                'keterangan' => json_encode($list),
            ]);
            return redirect('listdata?sesi=formatsurat')->with('du','List Data');
        } else {
            Listdata::where('id',$request->id)->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
            ]);
            return back()->with('du','List Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function destroy($listdata)
    {
        Listdata::find($listdata)->delete();
        return back()->with('dd','List Data');
    }
}
