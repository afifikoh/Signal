@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Pengguna PAC</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Pengguna PAC</li>
  </ol>
</h1>
@endsection

@section('isi')
<div class="row">
<div class="col-lg-12">
    <a href="/tambah_userpac">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</button>
    </a>
    <div class="card mb-4">
      <div class="table-responsive p-3">
        <table id="dataTableHover" class="table table-bordered align-items-center table-hover" >
          <thead class="thead-light">
            <tr>
              <th style="text-align: center" width="20px">No</th>
              <th style="text-align: center">Akun</th>
              <th style="text-align: center">Organisasi</th>
              <th style="text-align: center">Nama Kecamatan</th>
              <th style="text-align: center">Email</th>
              <th style="text-align: center">Level</th>
              <th style="text-align: center" width="100">Aksi</th>
            </tr>
          </thead>
          <tbody>
             @php $no=1; @endphp
             @foreach ($pac as $data)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->nama_organisasi }}</td>
              <td style="text-align: center">{{ $data->nama_kecamatan }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->level }}</td>
              <td style="text-align: center">
                <a href="/edit_userpac/{{ $data->id }}">
                <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                </a>
                <a href="/userpac-hapus/{{ $data->id }}">
                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </a>
              </td>
            </tr>
            
            @endforeach
    </table>
  </div>
</div>
</div>
</div>
@endsection

