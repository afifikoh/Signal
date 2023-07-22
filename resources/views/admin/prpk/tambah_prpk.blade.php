@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Kecamatan</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/userprpk">Data User PAC</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data User PAC</h6>
        </div>
        <div class="card-body">
        <form action="/userprpk-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" hidden class="form-control" id="ket" name="ket" value="PR/PK">
            </div>
            <div class="form-group">
                <label for="id_ket">Nama Organisasi</label>
                <select class="form-control @error('id_ket') is-invalid @enderror" id="id_kets" name="id_ket">
                    <option value="">- Pilih Organisasi PR/PK -</option>
                    @foreach ($prpk as $data)
                    <option value="{{ $data->id }}" data-nama="{{ $data->nama_organisasi }}" data-kec="{{ $data->id_kecamatan }}"> {{ $data->nama_organisasi }} </option>
                    @endforeach
                </select>
                @error('id_ket')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control" hidden id="namas" name="nama" autocomplete="off" placeholder="Masukan Akun">
                <input type="text" class="form-control" hidden id="kecs" name="id_kec" autocomplete="off" placeholder="Masukan Akun">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off" placeholder="Masukan Email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" placeholder="Masukan Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" hidden id="level" name="level" value="pr/pk">
            </div>
        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary mr-3" >Submit</button>
        </div>
        </form>
        </div>      
    </div>
@endsection

@push('footer-script')
    <script type="text/javascript">
        $('#id_kets').on('change', function(){
            var $option = $(this).find(':selected')
            var nama = $option.data('nama');
            var kec = $option.data('kec');

            $('#namas').val(nama);
            $('#kecs').val(kec);
        });
    </script>
@endpush