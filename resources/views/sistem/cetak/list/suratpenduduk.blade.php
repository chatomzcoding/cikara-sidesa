<!DOCTYPE html>
<html>
<head>
	<title>Data Surat Penduduk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<section class="text-center">
            <h4>Data Surat Penduduk</h4>
            <hr>
        </section>
        <table class="table table-bordered small">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal Permintaan</th>
                    <th>Surat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    @if (filter_data_get($filter,[$item->status,$item->user_id,$item->created_at]))
                      <tr>
                          <td class="text-center">{{ $no }}</td>
                          <td>{{ DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>{{ $item->nama_surat }}</td>
                          <td class="text-center">{{ $item->status }}</td>
                      </tr>
                      @php
                          $no++
                      @endphp
                    @endif

                @endforeach
        </table>
	</div>
</body>
</html>