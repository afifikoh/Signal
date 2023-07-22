@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data PAC</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data PAC</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->

    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data {{ $pac->nama_organisasi }}</h6>
        </div>
        <div class="card-body">
        <form action="/ubah_pac/{{ $pac->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_organisasi" class="col-sm-3 col-form-label">Nama Organisasi</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_organisasi" value="{{ $pac->nama_organisasi }}" id="nama_organisasi" placeholder="Masukan Nama Organisasi" >
                </div>
            </div>
            <div class="form-group row">
                <label for="masa_khidmat" class="col-sm-3 col-form-label">Masa Khidmat</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="masa_khidmat"  value="{{ $pac->masa_khidmat }}" id="masa_khidmat" placeholder="Masukan Masa Khidmat" >
                </div>
            </div>
            <div class="form-group row">
                <label for="no_sp" class="col-sm-3 col-form-label">No Surat Pengesahan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control"  name="no_sp" id="no_sp" value="{{ $pac->no_sp }}" placeholder="Masukan No Surat Pengesahan" >
                </div>
            </div>
            <div class="form-group row">
                <label for="berlaku_sp" class="col-sm-3 col-form-label">Masa Berlaku SP</label>
                <div class="col-sm-9">
                    <div class="form-group" id="simple-date1">
                        <div class="input-group date">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $pac->berlaku_sp }}" name="berlaku_sp" id="berlaku_sp" placeholder="Masukan Masa Berlaku SP">
                        </div>
                    </div>
                {{-- <input type="date" class="form-control" nama="berlaku_sp" id="berlaku_sp" placeholder="Masukan Masa Berlaku SP" value="{{ $pac->berlaku_sp }}"> --}}
                </div>
            </div>
            <div class="form-group row">
                <label for="ketua" class="col-sm-3 col-form-label">Ketua</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ $pac->ketua }}" name="ketua" id="ketua" placeholder="Masukan Nama Ketua" >
                </div>
            </div>
            <div class="form-group row">
                <label for="sekretaris" class="col-sm-3 col-form-label">Sekretaris</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ $pac->sekretaris }}" name="sekretaris" id="sekretaris" placeholder="Masukan Nama Sekretaris" >
                </div>
            </div>
            <div class="form-group row">
                <label for="ttd_ketua" class="col-sm-3 col-form-label">Tanda Tangan Ketua</label>
                <div class="col-sm-9">
                {{-- <input type="ttd_sekretaris" class="form-control" nama="ttd_sekretaris" id="ttd_sekretaris" placeholder="Masukan Tanda Tangan Sekretaris" value="{{ $pac->ttd_sekretaris }}"> --}}
                <input type="hidden" name="old_ttd" value="{{ $pac->ttd_ketua }}">
                        @if($pac->ttd_ketua)
                        <img src="/arsip_PAC/Ttd_ketua/{{ $pac->ttd_ketua }}" alt="" height="50px">
                        <a href="{{ asset('arsip_PAC/Ttd_ketua/'.$pac['ttd_ketua']) }}" name="old_file">Lihat Foto</a>
                        @else
                            <span class= "badge badge-danger">Belum ada File</span>
                        @endif
                            <div class="custom-file @error('ttd_ketua') is-invalid @enderror" id="ttd_ketua" name="ttd_ketua" value="{{ $pac->ttd_ketua }}">
                                <input type="file" class="custom-file-input" name="ttd_ketua" id="ttd_ketua">
                                <label class="custom-file-label" for="ttd_ketua">Masukan file</label>
                            </div>
                            @error('ttd_ketua')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="file_sp" class="col-sm-3 col-form-label">File Surat Pengesahan</label>
                <div class="col-sm-9">
                <input type="hidden" name="old_file" value="{{ $pac->file_sp }}">
                        @if($pac->file_sp)
                            <a href="{{ asset('arsip_PAC/File_SP/'.$pac['file_sp']) }}" name="old_file">Lihat File</a>
                        @else
                            <span class= "badge badge-danger">Belum ada File</span>
                        @endif
                            <div class="custom-file @error('file_sp') is-invalid @enderror" id="file_sp" name="file_sp" value="{{ $pac->file_sp }}">
                                <input type="file" class="custom-file-input" name="file_sp" id="file_sp">
                                <label class="custom-file-label" for="file_sp">Masukan file</label>
                            </div>
                            @error('file_sp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ubah Data</button>
        </form>
        </div>      
    </div>

@endsection

@push('footer-script')
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
@endpush