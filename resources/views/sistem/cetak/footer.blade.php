@php
    $desa       = DbCikara::showtablefirst('profil'); 
    $staf       = DbCikara::showtablefirst('staf',['id',$_GET['staf']]);
@endphp
<footer style="margin-top: 70px">
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td class="text-center">
               {{ $desa->nama_desa }}, {{ date_indo(tgl_sekarang()) }} <br>
               {{ ucwords($staf->jabatan) }} <br><br><br><br>
               {{ ucwords($staf->nama_pegawai) }} <br>
               {{ $staf->nip }}
            </td>
        </tr>
    </table>
</footer>