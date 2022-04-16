<form action="{{ url('suratpenduduk') }}" method="post">
    @csrf
    <input type="hidden" name="formatsurat_id" value="{{ $formatsurat->id }}">
    <input type="hidden" name="user_id" value="{{ $main['data']['user']->user_id }}">
    <div class="row">
        @foreach (json_decode($listformat->keterangan) as $item)
        <div class="col-md-4">
            <div class="form-group pt-2 pb-0">
                <label for="" class="text-capitalize">{{ $item->label }} <strong class="text-danger">*</strong></label>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                @switch(form_view($item->key))
                    @case('nomor')
                        <input type="text" name="{{ $item->key }}" pattern="[0-9]{16}" maxlength="16" value="{{ valueform($main['data'],$item->key) }}" class="form-control" required>
                        <span class="text-danger small font-italic">* jumlah 16 angka</span>
                    @break
                    @case('tanggal')
                        <input type="date" name="{{ $item->key }}" class="form-control" required>
                        @break
                    @case('waktu')
                        <input type="time" name="{{ $item->key }}" class="form-control" required>
                        @break
                    @case('angka')
                        <input type="number" name="{{ $item->key }}" min="1" class="form-control" required>
                        @break
                    @case('jk')
                        <select name="{{ $item->key }}" id="" class="form-control" required>
                            @foreach (list_jeniskelamin() as $item->key)
                                <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                            @endforeach
                        </select>
                        @break
                    @case('agama')
                        <select name="{{ $item->key }}" id="" class="form-control" required>
                            <option value="">-- pilih agama --</option>
                            @foreach (list_agama() as $item->key)
                                <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                            @endforeach
                        </select>
                        @break
                    @case('pekerjaan')
                        <select name="{{ $item->key }}" id="" class="form-control" required>
                            <option value="">-- pilih pekerjaan --</option>
                            @foreach (list_pekerjaan() as $item->key)
                                <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                            @endforeach
                        </select>
                        @break
                    @case('warganegara')
                        <select name="{{ $item->key }}" id="" class="form-control" required>
                            <option value="">-- Pilih Warga Negara --</option>
                            @foreach (list_statuskewarganegaraan() as $item->key)
                                <option value="{{ $item->key}}">{{ strtoupper($item->key) }}</option>
                            @endforeach
                        </select>
                        @break
                    @default
                        <input type="text" name="{{ $item->key }}" value="{{ valueform($main['data'],$item->key) }}" class="form-control" required>
                @endswitch
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Berlaku dari <strong class="text-danger">*</strong></label>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group row">
                <div class="col-md-5">
                    <input type="date" name="tgl_awal" value="{{ tgl_sekarang() }}" class="form-control" required>
                </div>
                <div class="col-md-2 text-center p-2">
                    sampai
                </div>
                <div class="col-md-5">
                    <input type="date" name="tgl_akhir" value="{{ tgl_sekarang() }}" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Ditandatangani oleh <strong class="text-danger">*</strong></label>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                  <select name="staf_id" class="form-control penduduk" data-width="100%" required>
                    @foreach ($main['staf'] as $item)
                    <option value="{{ $item->id }}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan) }}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> SIMPAN DATA SURAT</button>
        </div>
    </div>
</form>