@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Realisasi Program Kerja</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Realisasi Program Kerja</li>
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
                <th style="text-align: center">Nama Kegiatan</th>
                <th style="text-align: center">Tanggal</th>
                <th style="text-align: center">Tempat</th>
                <th style="text-align: center">Pelaksana</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Detail</th>
              {{-- <th style="text-align: center">Aksi</th> --}}
            </tr>
          </thead>
          <tbody>
             @php $no=1; @endphp
             @foreach ($keg as $data)
                <tr class="odd">
                <td style="text-align: center">{{ $no++ }}</td>
                <td>{{ $data->nama_keg }}</td>
                <td>{{ $data->tgl_keg }}</td>
                <td>{{ $data->tempat }}</td>
                <td>{{ $data->pelaksana }}</td>
                @if($data->status == 'Terverifikasi')
                <td style="text-align:center">
                  <span class="badge rounded-pill bg-success">{{ $data->status }}</span>
                </td>
                @else
                <td style="text-align:center">
                  <span class="badge rounded-pill bg-warning">{{ $data->status }}</span>
                </td>    
                @endif
                <td>
                    <button type="button" data-toggle="modal" data-target="#lihat_prokjapac{{ $data->id }}" class="btn btn-rounded btn-info"><i class="fas fa-eye"></i></button>
                    {{-- modal --}}
                    <div class="modal fade" id="lihat_prokjapac{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle" style="text-align:center">Detail Program Kerja</h5> 
                          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> --}}
                        </div>
                        <div class="modal-body"> <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 label">Departemen</div>
                                <div class="col-lg-6 col-md-8">: {{ $data->departemen }}</div>
                            </div> <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 label">Nama Kegiatan</div>
                                <div class="col-lg-6 col-md-8">: {{ $data->nama_keg }}</div>
                            </div> <br>
                            <div class="row">
                              <div class="col-lg-4 col-md-4 label">Tanggal Kegiatan</div>
                              <div class="col-lg-6 col-md-8">: {{ $data->tgl_keg }}</div>
                            </div> <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 label">Tempat Kegiatan</div>
                                <div class="col-lg-6 col-md-8">: {{ $data->jangka }}</div>
                            </div> <br>
                            <div class="row">
                                <img src="" alt="">
                            </div> <br>
                            <div class="row">
                                {{-- berita acara --}}
                            </div> <br>
                          </div>
                      </div>
                    </div>
                  </div>
                </td>
                </tr>
            </tbody>
            @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

