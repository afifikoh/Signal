@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Program Kerja</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Program Kerja</li>
  </ol>
</h1>
@endsection

@section('isi')
<div class="row">
  <div class="col-lg-12">
    
    <div class="card mb-4">
      <div class="table-responsive p-3">
      <form>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

