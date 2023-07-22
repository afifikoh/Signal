@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Organisasi PAC</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Organisasi PAC</li>
  </ol>
</h1>
@endsection

@section('isi')
<div class="row">
<div class="col-lg-12">
    <a href="/tambah_dtpac">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</button>
    </a>
    <div class="card mb-4">
      <div class="table-responsive p-3">
        <table id="dataTableHover" class="table table-bordered align-items-center table-hover">
          <thead class="thead-light">
            <tr>
              <th style="text-align: center" width="20px">No</th>
              <th style="text-align: center">Nama Organisasi</th>
              <th style="text-align: center">Nama Kecamatan</th>
              <th style="text-align: center" width="100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
             @php $no=1; @endphp
             @foreach ($pac as $data)
            <tr>
              <td style="text-align: center">{{ $no++ }}</td>
              <td>{{ $data->nama_organisasi }}</td>
              <td>{{ $data->nama_kecamatan }}</td>
              <td style="text-align: center">
                 {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"
                    id="#modalCenter"><i class="fas fa-eye"></i></button> --}}
                <a href="/edit_dtpac/{{ $data->id }}">
                <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                </a>
                <a href="/dtpac-hapus/{{ $data->id }}">
                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </a>
              </td>
            </tr>
            {{-- modal --}}
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Modal Vertically Centered</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Your Content
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
            @endforeach
    </table>
  </div>
</div>
</div>
</div>
@endsection

