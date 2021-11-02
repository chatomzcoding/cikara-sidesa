<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\Forumdiskusi;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder = 'public/img/layanan/forum';

    public function index()
    {
        $forum  = Forum::all();
        $judul  = 'Forum Warga';
        $total  = [
            'jumlah' => count($forum),
            'warga' => Forumdiskusi::count(),
            'aktif' => Forum::where('status','aktif')->count(),
            'non-aktif' => Forum::where('status','non-aktif')->count(),
        ];
        $menu   = 'forumpenduduk';
        return view('admin.layananmandiri.forum.index', compact('judul','forum','total','menu'));
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
            'poto' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('poto');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Forum::create([
            'nama' => $request->nama,
            'ket_forum' => $request->ket_forum,
            'status' => $request->status,
            'poto' => $nama_file,
        ]);

        return redirect()->back()->with('ds', 'Forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        deletefile($this->folder.'/'.$forum->poto);

        $forum->delete();

        return redirect()->back()->with('dd','Forum');
    }
}
