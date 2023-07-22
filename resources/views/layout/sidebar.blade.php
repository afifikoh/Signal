<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" >
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="background-color: #007466">
      <div class="sidebar-brand-icon">
        <img src="/img/LOGO MMII.png">
      </div>
      <div class="sidebar-brand-text mx-3">SIGNAL-NU</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('/beranda') ? 'active' : '' }}">
      <a class="nav-link" href="/beranda">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><b>Beranda</b></span></a>
    </li>
    <hr class="sidebar-divider">
@if ($user->level=='Admin')
    <div class="sidebar-heading">
      Wilayah
    </div>
    <li class="nav-item">
      <a class="nav-link" href="/dt_kec">
        <i class="fas fa-street-view"></i>
        <span>Data Kecamatan</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="/dt_zona">
        <i class="fas fa-map-marked-alt"></i>
        <span>Data Zona</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link" href="/dt_ranting">
        <i class="fas fa-map-marker-alt"></i>
        <span>Data Ranting</span>
      </a>
    </li> --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Organisasi
    </div>
    <li class="nav-item">
      <a class="nav-link" href="/dtpac">
        <i class="fas fa-sitemap"></i>
        <span>Data PAC</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="/dt_zona">
        <i class="fas fa-map-marked-alt"></i>
        <span>Data Zona</span>
      </a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="/dtprpk">
        <i class="fas fa-sitemap"></i>
        <span>Data PR/PK</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Pengguna
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="dt_pac">
        <i class="fas fa-users"></i>
        <span>Pengguna PAC</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="userprpk" >
        <i class="fas fa-users"></i>
        <span>Pengguna PR/PK</span>
      </a>
    </li>
    <hr class="sidebar-divider">

@elseif ($user->level == 'Sekretaris')
    <div class="sidebar-heading">
      Administrasi
    </div>
    <li class="nav-item">
      <a class="nav-link" href="/dt_srtmasuk">
        <i class="far fa-fw fa-envelope"></i>
        <span>Surat Masuk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
        aria-controls="collapseForm">
        <i class="far fa-fw fa-paper-plane"></i>
        <span>Surat Keluar</span>
      </a>
      <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="form_basics.html">Data Surat IPPNU</a>
          <a class="collapse-item" href="form_advanceds.html">Data Surat Bersama</a>
          <a class="collapse-item" href="form_advanceds.html">Tambah Surat Keluar</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Kegiatan
    </div>
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePAC" aria-expanded="true"
        aria-controls="collapsePAC">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Kegiatan PAC</span>
      </a>
      <div id="collapsePAC" class="collapse" aria-labelledby="headingPAC" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="/data_prokjapac">Program Kerja</a>
          <a class="collapse-item" href="/data_kegpac">Realisasi Program Kerja</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePRPK" aria-expanded="true"
        aria-controls="collapsePRPK">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Kegiatan PR/PK</span>
      </a>
      <div id="collapsePRPK" class="collapse" aria-labelledby="headingPRPK" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="form_basics.html">Program Kerja</a>
          <a class="collapse-item" href="form_advanceds.html">Realisasi Program Kerja</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Organisasi
    </div>
    <li class="nav-item">
      {{-- <a class="nav-link collapsed" href="/data_pac"> --}}
      <a class="nav-link collapsed" href="/lihat_pac/{{ $user->id_ket }}">
        <i class="fas fa-sitemap"></i>
        <span>Data PAC</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" >
        <i class="fas fa-user-friends"></i>
        <span>Data Zona</span>
      </a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="/data_prpk" >
        <i class="fas fa-users"></i>
        <span>Data PR/PK</span>
      </a>
    </li>
    <hr class="sidebar-divider">


@elseif ($user->level == 'Ketua')
    <div class="sidebar-heading">
      Administrasi
    </div>
    <li class="nav-item">
      <a class="nav-link" href="/dtt_srtmasuk">
        <i class="far fa-fw fa-envelope"></i>
        <span>Surat Masuk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat" aria-expanded="true"
        aria-controls="collapseSurat">
        <i class="far fa-fw fa-paper-plane"></i>
        <span>Surat Keluar</span>
      </a>
      <div id="collapseSurat" class="collapse" aria-labelledby="headingSurat" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="form_basics.html">Data Surat Keluar</a>
          <a class="collapse-item" href="form_advanceds.html">Verifikasi Surat Keluar</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Kegiatan
    </div>
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePAC" aria-expanded="true"
        aria-controls="collapsePAC">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Kegiatan PAC</span>
      </a>
      <div id="collapsePAC" class="collapse" aria-labelledby="headingPAC" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="/dataa_prokjapac">Program Kerja</a>
          <a class="collapse-item" href="form_advanceds.html">Realisasi Program Kerja</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePRPK" aria-expanded="true"
        aria-controls="collapsePRPK">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Kegiatan PR/PK</span>
      </a>
      <div id="collapsePRPK" class="collapse" aria-labelledby="headingPRPK" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="form_basics.html">Program Kerja</a>
          <a class="collapse-item" href="form_advanceds.html">Realisasi Program Kerja</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Organisasi
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="/lihatt_pac/{{ $user->id_ket }}">
        <i class="fas fa-sitemap"></i>
        <span>Data PAC</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="/dataa_prpk" >
        <i class="fas fa-users"></i>
        <span>Data PR/PK</span>
      </a>
    </li>
    <hr class="sidebar-divider">  

@elseif ($user->level == 'pr/pk')
    <div class="sidebar-heading">
      Organisasi
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" >
        <i class="fas fa-users"></i>
        <span>Data PR/PK</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Kegiatan PR/PK
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Program Kerja</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="fas fa-calendar-check"></i>
        <span>Realisasi Program Kerja</span>
      </a>
    </li>
    <hr class="sidebar-divider">



@endif
  </ul>
  <!-- Sidebar -->