<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder   = 'public/img/pengaturan/slider';
    protected $table    = 'Slider';

    public function __construct()
    {
        
    }

    public function index()
    {
        $slider = Slider::orderBy('id','ASC')->get();
        $menu   = 'slider';
        return view('admin.pengaturan.slider.index', compact('slider','menu'));
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
        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:6000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Slider::create([
            'nama_slider' => $request->nama_slider,
            'link' => $request->link,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('ds', $this->table);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slider = Slider::find($request->id);
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);

            deletefile($tujuan_upload.'/'.$slider->gambar);
        } else {
            $nama_file = $slider->gambar;
        }

        Slider::where('id',$request->id)->update([
            'nama_slider' => $request->nama_slider,
            'link' => $request->link,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('du', $this->table);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        deletefile($this->folder.'/'.$slider->gambar);
        $slider->delete();
        return redirect()->back()->with('du', $this->table);
    }
}
