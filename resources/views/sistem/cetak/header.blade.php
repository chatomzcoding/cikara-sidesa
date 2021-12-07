@php
    $desa       = DbCikara::showtablefirst('profil'); 
    $website    = DbCikara::showtablefirst('info_website'); 
@endphp
<header>
    <table width="100%">
        <tr>
            <td width="20%">
                <section>
                    <img src="{{ asset('img/'.$website->logo_brand)}}" alt="" width="180px">
                </section>
            </td>
            <td>
                <section class="text-center"> 
                    <div class="text-uppercase h4">
                        PEMERINTAH {{ $website->sebutan_kabupaten.' '.$desa->nama_kabupaten }} <br>
                        KECAMATAN {{ $desa->nama_kecamatan }} <br>
                        {{ $website->sebutan_desa.' '.$desa->nama_desa }} <br>
                    </div>
                    <div>
                        {{ $desa->alamat }}
                    </div>
                </section>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: 2px black solid">
            </td>
        </tr>
    </table>
</header>