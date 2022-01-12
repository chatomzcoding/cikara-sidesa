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

        // self::importmanual();
        $menu   = 'listdata';
        $sesi   = (isset($_GET['sesi'])) ? $_GET['sesi'] : 'pekerjaan' ;
        $listdata   = Listdata::where('label',$sesi)->orderBy('nama','ASC')->get();
        $filter     = [
            'sesi' => $sesi
        ];
        return view('admin.pengaturan.listdata.index', compact('menu','listdata','filter'));
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
        //
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
    public function edit(Listdata $listdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listdata $listdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listdata $listdata)
    {
        //
    }
}
