@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data PR/PK</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data PR/PK</li>
  </ol>
</h1>
@endsection

@section('isi')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="table-responsive p-3">
        <table id="dataTableHover" class="table align-items-center table-flush" >
          <thead class="thead-light">
            <tr>
              <th width="20px">No</th>
                <th style="text-align: center">Nama Organisasi</th>
                <th style="text-align: center">Ranting/Komisariat</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
             @php $no=1; @endphp
             @foreach ($prpk as $data)
                <tr class="odd">
                <td style="text-align: center">{{ $no++ }}</td>
                <td>{{ $data->nama_organisasi }}</td>
                <td>{{ $data->prpk }}</td>
                <td>{{ $data->email }}</td>
                
                <td style="text-align: center">
                    <a href="/detail_prpk/{{ $data->id }}" class="btn btn-rounded btn-info"><i class="fas fa-eye"></i></a>
                </td>
                </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

