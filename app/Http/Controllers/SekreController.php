<?php

namespace App\Http\Controllers;

use App\Imports\SuratMasukImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat_masuk;
use App\Models\Surat_keluar;
use App\Models\Kecamatan;
use App\Models\Kegiatan;
use App\Models\Zona;
use App\Models\Pr_pk;
use App\Models\Prokja;
use App\Models\User;
use App\Models\Pac;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// use Toastr;
use Yoeunes\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class SekreController extends Controller
{
  //Surat Masuk
    public function dt_srtmasuk ()
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::where("pac_id", "=", $user->id_ket)
        ->get();
        return view("pac/sekretaris/srt_masuk/srt_masuk", compact('srt_masuk'))->with(["user" => $user]);
    }

    public function create_srtmasuk ()
    {
        $user = Auth::User();
        return view("pac/sekretaris/srt_masuk/tambah_srtmasuk")->with(["user" => $user]);
    }

    public function store_srtmasuk (Request $request)
    {
        $validated = $request->validate([
            
            'tgl_surat'     => 'required',
            'no_surat'   => 'required',
            'perihal'     => 'required',
            'pengirim'   => 'required',
            'file'   => 'required',
        ],
        [
            'tgl_surat.required'     => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required'   => 'No Surat tidak boleh kosong',
            'perihal.required'     => 'Perihal tidak boleh kosong',
            'pengirim.required'   => 'Pengirim tidak boleh kosong',
            'file.required'   => 'File Surat tidak boleh kosong',
        ]);

        $file = $request->file('file');
        $newFile = 'file_surat' . '_' . time() . '.' . $file->extension();
    
        $path = 'arsip_SM/';
        $request->file->move(public_path($path), $newFile);

        $srt_masuk = new Surat_masuk();
        $srt_masuk->tgl_masuk = $request->tgl_masuk;
        $srt_masuk->tgl_surat = $request->tgl_surat;
        $srt_masuk->no_surat = $request->no_surat;
        $srt_masuk->perihal = $request->perihal;
        $srt_masuk->pengirim = $request->pengirim;
        $srt_masuk->isi_surat = $request->isi_surat;
        $srt_masuk->pac_id = $request->pac_id;
        $srt_masuk->file = $newFile;
        $srt_masuk->save();
        
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect('dt_srtmasuk');

    }

    public function edit_srtmasuk(Request $request, $id)
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::find($id);
        return view('pac/sekretaris/srt_masuk/edit_srtmasuk', compact('srt_masuk'))->with(["user" => $user]);
    }

    public function detail_srtmasuk(Request $request, $id)
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::find($id);
        return view('pac/sekretaris/srt_masuk/detail_srtmasuk', compact('srt_masuk'))->with(["user" => $user]);
    }

    public function update_srtmasuk(Request $request, $id)
    {
        $srt_masuk = Surat_masuk::find($id);
        $newFile = $srt_masuk->file;
        $pathFile = public_path('arsip_SM/ . $newFile');

        if ($request->hasFile('file'))
        {
            @unlink($pathFile);

            $file = $request->file('file');
            $file_ext = $file->getClientOriginalExtension();
            $newFile = 'file_surat' . '_'. time() . '.' . $file_ext;
            $pathFile = 'arsip_SM/';
            $file->move($pathFile, $newFile);
            $srt_masuk->file = $newFile;
        }
        else
        {
            $srt_masuk->file = $request->old_file;
        }

        $srt_masuk->tgl_masuk = $request->tgl_masuk;
        $srt_masuk->tgl_surat = $request->tgl_surat;
        $srt_masuk->no_surat = $request->no_surat;
        $srt_masuk->perihal = $request->perihal;
        $srt_masuk->pengirim = $request->pengirim;
        $srt_masuk->isi_surat = $request->isi_surat;
        $srt_masuk->save();

        toastr()->success('Data Berhasil Diubah!', 'Selamat');
        return redirect('dt_srtmasuk');
        
    }

    public function destory_srtmasuk(Request $request, $id)
    {
        $srt_masuk = Surat_masuk::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dt_srtmasuk');
    }

  //Surat Keluar
    public function dt_srtkeluar ()
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::where("pac_id", "=", $user->id_ket)
        ->get();
        return view("pac/sekretaris/srt_masuk/srt_masuk", compact('srt_masuk'))->with(["user" => $user]);
    }

    public function create_srtkeluar ()
    {
        $user = Auth::User();
        return view("pac/sekretaris/srt_masuk/tambah_srtkeluar")->with(["user" => $user]);
    }

    public function store_srtkeluar (Request $request)
    {
        $validated = $request->validate([
            
            'isi_surat'   => 'required',
            'tgl_masuk'   => 'required',
            'tgl_surat'   => 'required',
            'no_surat'    => 'required',
            'perihal'     => 'required',
            'pengirim'    => 'required',
            'file'        => 'required',
        ],
        [
            'isi_surat.required'    => 'Isi Surat tidak boleh kosong',
            'tgl_masuk.required'    => 'Tanggal Masuk Surat tidak boleh kosong',
            'tgl_surat.required'    => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required'     => 'No Surat tidak boleh kosong',
            'perihal.required'      => 'Perihal tidak boleh kosong',
            'pengirim.required'     => 'Pengirim tidak boleh kosong',
            'file.required'         => 'File Surat tidak boleh kosong',
        ]);

        $file = $request->file('file');
        $newFile = 'file_surat' . '_' . time() . '.' . $file->extension();
    
        $path = 'arsip_SM/';
        $request->file->move(public_path($path), $newFile);

        $srt_keluar = new Surat_keluar();
        $srt_keluar->tgl_keluar = $request->tgl_keluar;
        $srt_keluar->tgl_surat = $request->tgl_surat;
        $srt_keluar->no_surat = $request->no_surat;
        $srt_keluar->perihal = $request->perihal;
        $srt_keluar->pengirim = $request->pengirim;
        $srt_keluar->isi_surat = $request->isi_surat;
        $srt_keluar->pac_id = $request->pac_id;
        $srt_keluar->file = $newFile;
        $srt_keluar->save();
        
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect('dt_srtkeluar');

    }

    public function edit_srtkeluar(Request $request, $id)
    {
        $user = Auth::User();
        $srt_keluar = Surat_keluar::find($id);
        return view('pac/sekretaris/srt_keluar/edit_srtkeluar', compact('srt_keluar'))->with(["user" => $user]);
    }

    public function update_srtkeluar(Request $request, $id)
    {
        $srt_keluar = Surat_keluar::find($id);
        $newFile = $srt_keluar->file;
        $pathFile = public_path('arsip_SM/ . $newFile');

        if ($request->hasFile('file'))
        {
            @unlink($pathFile);

            $file = $request->file('file');
            $file_ext = $file->getClientOriginalExtension();
            $newFile = 'file_surat' . '_'. time() . '.' . $file_ext;
            $pathFile = 'arsip_SM/';
            $file->move($pathFile, $newFile);
            $srt_keluar->file = $newFile;
        }
        else
        {
            $srt_keluar->file = $request->old_file;
        }

        $srt_keluar->tgl_keluar = $request->tgl_keluar;
        $srt_keluar->tgl_surat = $request->tgl_surat;
        $srt_keluar->no_surat = $request->no_surat;
        $srt_keluar->perihal = $request->perihal;
        $srt_keluar->pengirim = $request->pengirim;
        $srt_keluar->isi_surat = $request->isi_surat;
        $srt_keluar->save();

        toastr()->success('Data Berhasil Diubah!', 'Selamat');
        return redirect('dt_srtkeluar');
        
    }

    public function destory_srtkeluar(Request $request, $id)
    {
        $srt_keluar = Surat_keluar::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dt_srtkeluar');
    }

   //Data PAC
   public function lihat_pac(Request $request, $id)
    {
        $user = Auth::User();
        $pac = Pac::find($id);
        return view('pac/sekretaris/dt_pac/dt_pac', compact('pac'))->with(["user" => $user]);
    }
    
    public function update_pac(Request $request, $id)
    {
        
        $validated = $request->validate([
            'ttd_sekretaris'   => 'nullable|mimes:png',
            'cap_organisasi'   => 'nullable|mimes:png',
            'kop_surat'        => 'nullable|mimes:png,jpg',
            'file_sp'          => 'nullable|mimes:pdf',
        ],
        [
            'ttd_sekretaris.mimes:png' => 'TTD harus dalam bentuk format PNG!',
            'cap_organisasi.mimes:png' => 'Cap Organisasi harus dalam bentuk format PNG!',
            'kop_surat.mimes:png'      => 'Kop Surat harus dalam bentuk format PNG!',
            'file_sp.mimes:png'        => 'File Surat Pengesahan harus dalam bentuk format PDF!',
        ]);

        $pac = Pac::find($id);

        $newTtd = $pac->ttd_sekretaris;
        $newCap = $pac->cap_organisasi;
        $newKop = $pac->kop_surat;
        $newFile = $pac->file_sp;
        $pathFile = public_path('arsip_PAC/File_SP/ . $newFile');
        $pathKop = public_path('arsip_PAC/Kop_surat/ . $newKop');
        $pathTtd = public_path('arsip_PAC/Ttd_sekretaris/ . $newTtd');
        $pathCap = public_path('arsip_PAC/Cap_organisasi/ . $newCap');

        if ($request->hasFile('file_sp'))
        {
            @unlink($pathFile);

            $file = $request->file('file_sp');
            $file_ext = $file->getClientOriginalExtension();
            $newFile = 'file_sp'. '.' . $file_ext;
            $pathFile = 'arsip_PAC/File_SP/';
            $file->move($pathFile, $newFile);
            $pac->file_sp = $newFile;
        }
        else if ($request->hasFile('kop_surat'))
        {
            @unlink($pathKop);

            $kop = $request->file('kop_surat');
            $kop_ext = $kop->getClientOriginalExtension();
            $newKop = 'Kop_surat' . '.' . $kop_ext;
            $pathKop = 'arsip_PAC/Kop_surat/';
            $kop->move($pathKop, $newKop);
            $pac->kop_surat = $newKop;
        }
        else if ($request->hasFile('ttd_sekretaris'))
        {
            @unlink($pathTtd);

            $ttd = $request->file('ttd_sekretaris');
            $ttd_ext = $ttd->getClientOriginalExtension();
            $newTtd = 'Ttd_sekretaris' . '.' . $ttd_ext;
            $pathTtd = 'arsip_PAC/Ttd_sekretaris/';
            $ttd->move($pathTtd, $newTtd);
            $pac->ttd_sekretaris = $newTtd;
        }
        else if ($request->hasFile('cap_organisasi'))
        {
            @unlink($pathCap);

            $cap = $request->file('cap_organisasi');
            $cap_ext = $cap->getClientOriginalExtension();
            $newCap = 'Cap_organisasi' . '.' . $cap_ext;
            $pathCap = 'arsip_PAC/Cap_organisasi/';
            $cap->move($pathCap, $newCap);
            $pac->cap_organisasi = $newCap;
        }
        else
        {
            $pac->file_sp = $request->old_file;
            $pac->cap_organisasi = $request->old_cap;
            $pac->ttd_sekretaris = $request->old_ttd;
            $pac->kop_surat = $request->old_kop;
        }

        $pac->nama_organisasi = $request->nama_organisasi;
        $pac->no_sp = $request->no_sp;
        $pac->berlaku_sp = $request->berlaku_sp;
        $pac->masa_khidmat = $request->masa_khidmat;
        $pac->ketua = $request->ketua;
        $pac->sekretaris = $request->sekretaris;
        $pac->update();

        toastr()->success('Data Berhasil Diubah!', 'Selamat');
         return back();
    }

    //Data Zona
    public function data_zona(Request $request)
    {
        $user = Auth::User();
        $koor_zona = Zona::leftjoin('zona','users.id_ket')->where("id", "=", $user->id_ket)->where("users.keterangan", "=", "Koor_zona");
        return view('pac/sekretaris/dt_pac/lihat_pac', compact('users'))->with(["user" => $user]);
    }

    //Data PR PK
    public function data_prpk(Request $request)
    {
        $user = Auth::User();
        $prpk = DB::table("users")
                ->where("id_kec", "=", $user->id_kec)
                ->leftJoin("pr_pk", "users.id_ket", "=", "pr_pk.id")
                ->where("users.level", "=", "pr/pk")
                ->leftJoin("kecamatans", "pr_pk.id_kecamatan", "=", "kecamatans.id")
                ->select(
                    "users.nama",
                    "users.id",
                    "users.id_ket",
                    "users.level",
                    "users.email",
                    "pr_pk.id",
                    "pr_pk.prpk",
                    "pr_pk.id_kecamatan",
                    "kecamatans.nama_kecamatan",
                    "pr_pk.nama_organisasi",
                )
                ->get();
        return view('pac.sekretaris.dt_prpk.dt_prpk', compact('prpk'))->with(["user" => $user]);
    }

    public function detail_prpk()
    {
        $user = Auth::User();
        $prpk = Pr_pk::get();
        return view('pac.sekretaris.dt_prpk.tambah_prpk', compact('prpk'))->with(["user" => $user]);
    }

    //Data Prokja
    public function data_prokjapac(Request $request)
    {
        $user = Auth::User();
        $prokja = Prokja::where("id_ket", "=", $user->id_ket)
                ->where("ket", "=", "pac")
                ->get();
        return view("pac/sekretaris/prokja/prokja", compact('prokja'))->with(["user" => $user]);
    }

    public function tambah_prokjapac(Request $request)
    {
        $user = Auth::User();
        return view("pac/sekretaris/prokja/tambah_prokja")->with(["user" => $user]);
    }

    public function store_prokjapac(Request $request)
    {
        $validated = $request->validate([
            'nama_keg'    => 'required',
            'departemen'    => 'required',
            'tgl_keg'    => 'required',
            'mitra'    => 'required',
            'target'    => 'required',
            'output'    => 'required',
            'jangka'    => 'required',
            
        ],
        [
            'nama_keg.required'    => 'Nama Kegiatan tidak boleh kosong!',
            'departemen.required'    => 'Departemen tidak boleh kosong!',
            'tgl_keg.required'    => 'Tanggal Kegiatan tidak boleh kosong!',
            'mitra.required'    => 'Mitra tidak boleh kosong!',
            'target.required'    => 'Target tidak boleh kosong!',
            'jangka.required'    => 'Jangka Waktu tidak boleh kosong!',
            'output.required'    => 'Tujuan Kegiatan tidak boleh kosong!',
        ]);

        $prokja = new Prokja();
        $prokja->nama_keg = $request->nama_keg;
        $prokja->tgl_keg = $request->tgl_keg;
        $prokja->id_kec = $request->id_kec;
        $prokja->id_ket = $request->id_ket;
        $prokja->ket = $request->ket;
        $prokja->target = $request->target;
        $prokja->mitra = $request->mitra;
        $prokja->output = $request->output;
        $prokja->jangka = $request->jangka;
        $prokja->status = $request->status;
        $prokja->departemen = $request->departemen;
        $prokja->save();

        toastr()->success('Data Berhasil Ditambahkan!','Selamat');
        return redirect('/data_prokjapac');
    }

    // Data Realisasi Keg PAC
    public function data_kegpac(Request $request)
    {
        $user = Auth::User();
        $keg = Kegiatan::leftJoin("prokjas", "kegiatans.prokja_id", "prokjas.id" )
                ->where("id_ket", "=", $user->id_ket)
                ->where("ket", "=", "pac")
                ->get();
        return view("pac/sekretaris/realisasi/realisasi", compact('keg'))->with(["user" => $user]);
    }

    public function tambah_kegpac(Request $request)
    {
        $user = Auth::User();
        $prokja = Prokja::where("id_ket", "=", $user->id_ket)
                ->where("ket", "=", "pac")
                ->where("status", "=", "Belum terverifikasi")
                ->get();
        return view("pac/sekretaris/realisasi/tambah_realisasi", compact("prokja"))->with(["user" => $user]);
    }

    public function store_kegpac(Request $request)
    {
        $validated = $request->validate([
            'nama_keg'    => 'required',
            'tgl_keg'    => 'required',
            'tempat_keg'    => 'required',
            'pelaksana'    => 'required',
            'berita_acara'    => 'required',
            'foto_keg'    => 'required',
            
        ],
        [
            'nama_keg.required'    => 'Nama Kegiatan tidak boleh kosong!',
            'tgl_keg.required'    => 'Tanggal Kegiatan tidak boleh kosong!',
            'tempat_keg.required'    => 'Mitra tidak boleh kosong!',
            'pelaksana.required'    => 'Target tidak boleh kosong!',
            'foto_keg.required'    => 'Jangka Waktu tidak boleh kosong!',
            'berita_acara.required'    => 'Tujuan Kegiatan tidak boleh kosong!',
        ]);



        $keg = new Kegiatan();

        $newBerita = $keg->berita_acara;
        $newCap = $keg->cap_organisasi;
        $newKop = $keg->kop_surat;
        $newFile = $keg->file_sp;
        $pathFile = public_path('arsip_PAC/File_SP/ . $newFile');
        $pathKop = public_path('arsip_PAC/Kop_surat/ . $newKop');
        $pathTtd = public_path('arsip_PAC/Ttd_sekretaris/ . $newTtd');
        $pathCap = public_path('arsip_PAC/Cap_organisasi/ . $newCap');

        if ($request->hasFile('file_sp'))
        {
            @unlink($pathFile);

            $file = $request->file('file_sp');
            $file_ext = $file->getClientOriginalExtension();
            $newFile = 'file_sp'. '.' . $file_ext;
            $pathFile = 'arsip_PAC/File_SP/';
            $file->move($pathFile, $newFile);
            $keg->file_sp = $newFile;
        }
        else if ($request->hasFile('kop_surat'))
        {
            @unlink($pathKop);

            $kop = $request->file('kop_surat');
            $kop_ext = $kop->getClientOriginalExtension();
            $newKop = 'Kop_surat' . '.' . $kop_ext;
            $pathKop = 'arsip_PAC/Kop_surat/';
            $kop->move($pathKop, $newKop);
            $keg->kop_surat = $newKop;
        }
        else if ($request->hasFile('ttd_sekretaris'))
        {
            @unlink($pathTtd);

            $ttd = $request->file('ttd_sekretaris');
            $ttd_ext = $ttd->getClientOriginalExtension();
            $newTtd = 'Ttd_sekretaris' . '.' . $ttd_ext;
            $pathTtd = 'arsip_PAC/Ttd_sekretaris/';
            $ttd->move($pathTtd, $newTtd);
            $keg->ttd_sekretaris = $newTtd;
        }
        else if ($request->hasFile('cap_organisasi'))
        {
            @unlink($pathCap);

            $cap = $request->file('cap_organisasi');
            $cap_ext = $cap->getClientOriginalExtension();
            $newCap = 'Cap_organisasi' . '.' . $cap_ext;
            $pathCap = 'arsip_PAC/Cap_organisasi/';
            $cap->move($pathCap, $newCap);
            $keg->cap_organisasi = $newCap;
        }
        else
        {
            $keg->file_sp = $request->old_file;
            $keg->cap_organisasi = $request->old_cap;
            $keg->ttd_sekretaris = $request->old_ttd;
            $keg->kop_surat = $request->old_kop;
        }

        $keg->nama_keg = $request->nama_keg;
        $keg->tgl_keg = $request->tgl_keg;
        $keg->prokja_id = $request->prokja_id;
        $keg->pelaksana = $request->pelaksana;
        $keg->ket = $request->ket;
        $keg->target = $request->target;
        $keg->mitra = $request->mitra;
        $keg->output = $request->output;
        $keg->jangka = $request->jangka;
        $keg->status = $request->status;
        $keg->departemen = $request->departemen;
        $keg->save();

        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/data_prokjapac');
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            "import_excel"=>"required|mimes:xls,xlsx"
        ]);
        
        Excel::import(new SuratMasukImport,$request->file("import_excel"));
        return redirect('/dt_srtmasuk');
        
    }

    public function cetak_prokja()
    {
        $user = Auth::User();
        return view('/pac/sekretaris/prokja/cetak_prokja')->with(["user" => $user]);
    }




    

}
