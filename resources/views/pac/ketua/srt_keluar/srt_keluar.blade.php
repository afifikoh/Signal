@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Surat Masuk</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Surat Masuk</li>
  </ol>
</h1>
@endsection

@section('isi')
<div class="row">
  <div class="col-lg-12">
    <a href="/tambah_srtmasuk">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</button>
    </a>
    <div class="card mb-4">
      <div class="table-responsive p-3">
        <table id="dataTableHover" class="table align-items-center table-flush" >
          <thead class="thead-light">
            <tr>
              <th width="20px">No</th>
                <th style="text-align: center">Tanggal Masuk</th>
                {{-- <th style="text-align: center">Tanggal Surat</th>
                <th style="text-align: center">No Surat</th> --}}
                <th style="text-align: center">Perihal</th>
                <th style="text-align: center">Pengirim</th>
                <th style="text-align: center">Isi Surat</th>
                <th style="text-align: center">Arsip</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
             @php $no=1; @endphp
             @foreach ($srt_masuk as $data)
                <tr class="odd">
                <td style="text-align: center">{{ $no++ }}</td>
                <td>{{ $data->tgl_masuk }}</td>
                {{-- <td>{{ $data->tgl_surat }}</td>
                <td>{{ $data->no_surat }}</td> --}}
                <td>{{ $data->perihal }}</td>
                <td>{{ $data->pengirim }}</td>
                <td>{{ $data->isi_surat }}</td>
                <td style="text-align: center">
                    <a href="{{ asset('arsip_SM/'.$data->file) }}" class="btn btn-rounded btn-success"><i class="far fa-file-pdf"></i></a>
                </td>
                <td style="text-align: center">
                    <a href="/detail_srtmasuk/{{ $data->id }}" class="btn btn-rounded btn-info"><i class="fas fa-eye"></i></a>
                    <a href="/edit_srtmasuk/{{ $data->id }}" class="btn btn-rounded btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="/hapus-srtmasuk/{{ $data->id }}" data-toggle="modal" data-target="#hapus_srtmasuk"  class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
    {{-- <div class="modal fade" id="hapus_srtmasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Perhatian!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk menghapus data?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
          <a href="/hapus_srtmasuk/{{ $data->id }}" class="btn btn-danger">Hapus</a>
        </div> --}}
            <div class="modal fade" id="hapus_srtmasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabelLogout">Perhatian!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda yakin untuk menghapus data?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                      <a href="/hapus_srtmasuk/{{ $data->id }}" class="btn btn-danger">Hapus</a>
                    </div>
                  </div>
                </div>
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

