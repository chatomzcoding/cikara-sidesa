<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Klasifikasisurat;
use App\Models\Penduduksurat;
use Illuminate\Http\Request;

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
            return Formatsurat::all();
            # code...
        } else {
            return Formatsurat::where('kategori',$kategori)->get();
        }
        
    }

    public function formatsuratbykode($kode)
    {

        $kode       =  format_surat($kode);
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
                        'form' => $key
                    ];
                }
                break;
            
            default:
                $result = $kode;
                break;
        }
        return $result;
    }

    public function listsuratbyuser($user)
    {
        return Penduduksurat::where('user_id',$user)->get();
    }

    public function buatsurat(Request $request)
    {
       
        $format     = Formatsurat::find($request->formatsurat_id);
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'nomor_surat' => DbCikara::nomorsurat($format->kode),
            'status' => $request->status,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'no_kk' => $request->no_kk,
            'kepala_kk' => $request->kepala_kk,
            'status' => $request->status, 
            'rt_tujuan' => $request->rt_tujuan,
            'rw_tujuan' => $request->rw_tujuan,
            'dusun_tujuan' => $request->dusun_tujuan,
            'desa_tujuan' => $request->desa_tujuan,
            'kecamatan_tujuan' => $request->kecamatan_tujuan,
            'kabupaten_tujuan' => $request->kabupaten_tujuan,
            'alasan_pindah' => $request->alasan_pindah,
            'tanggal_pindah' => $request->tanggal_pindah,
            'jumlah_pengikut' => $request->jumlah_pengikut,
            'barang' => $request->barang,
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'ketua_adat' => $request->ketua_adat,
            'perbedaan' => $request->perbedaan,
            'kartu_identitas' => $request->kartu_identitas,
            'rincian' => $request->rincian,
            'usaha' => $request->usaha,
            'no_jamkesos' => $request->no_jamkesos,
            'hari_lahir' => $request->hari_lahir,
            'waktu_lahir' => $request->waktu_lahir,
            'kelahiran_ke' => $request->kelahiran_ke,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'umur_ibu' => $request->umur_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'desa_ibu' => $request->desa_ibu,
            'kec_ibu' => $request->kec_ibu,
            'kab_ibu' => $request->kab_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'umur_ayah' => $request->umur_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'desa_ayah' => $request->desa_ayah,
            'kec_ayah' => $request->kec_ayah,
            'kab_ayah' => $request->kab_ayah,
            'nama_pelapor' => $request->nama_pelapor,
            'nik_pelapor' => $request->nik_pelapor,
            'umur_pelapor' => $request->umur_pelapor,
            'pekerjaan_pelapor' => $request->pekerjaan_pelapor,
            'desa_pelapor' => $request->desa_pelapor,
            'kec_pelapor' => $request->kec_pelapor,
            'kab_pelapor' => $request->kab_pelapor,
            'prov_pelapor' => $request->prov_pelapor,
            'hub_pelapor' => $request->hub_pelapor,
            'tempat_lahir_pelapor' => $request->tempat_lahir_pelapor,
            'tanggal_lahir_pelapor' => $request->tanggal_lahir_pelapor,
            'nama_saksi1' => $request->nama_saksi1,
            'nama_saksi2' => $request->nama_saksi2,
            'nik_saksi1' => $request->nik_saksi1,
            'nik_saksi2' => $request->nik_saksi2,
            'tempat_lahir_saksi1' => $request->tempat_lahir_saksi1,
            'tempat_lahir_saksi2' => $request->tempat_lahir_saksi2,
            'tanggal_lahir_saksi1' => $request->tanggal_lahir_saksi1,
            'tanggal_lahir_saksi2' => $request->tanggal_lahir_saksi2,
            'umur_saksi1' => $request->umur_saksi1,
            'umur_saksi2' => $request->umur_saksi2,
            'pekerjaan_saksi1' => $request->pekerjaan_saksi1,
            'pekerjaan_saksi2' => $request->pekerjaan_saksi2,
            'desa_saksi1' => $request->desa_saksi1,
            'desa_saksi2' => $request->desa_saksi2,
            'kec_saksi1' => $request->kec_saksi1,
            'kec_saksi2' => $request->kec_saksi2,
            'kab_saksi1' => $request->kab_saksi1,
            'kab_saksi2' => $request->kab_saksi2,
            'prov_saksi1' => $request->prov_saksi1,
            'prov_saksi2' => $request->prov_saksi2,
        ]);
        return 'success';
    }
}
