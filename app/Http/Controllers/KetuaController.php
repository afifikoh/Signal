<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;

class KetuaController extends Controller
{
    //Surat Masuk
    public function dtt_srtmasuk ()
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::where("pac_id", "=", $user->id_ket)
        ->get();
        return view("pac/ketua/srt_masuk/srt_masuk", compact('srt_masuk'))->with(["user" => $user]);
    }

    public function detail_srtmasuk(Request $request, $id)
    {
        $user = Auth::User();
        $srt_masuk = Surat_masuk::find($id);
        return view('pac/ketua/srt_masuk/detail_srtmasuk', compact('srt_masuk'))->with(["user" => $user]);
    }

    //Data Prokja
    public function data_prokjapac(Request $request)
    {
        $user = Auth::User();
        $prokja = Prokja::where("id_ket", "=", $user->id_ket)
                ->where("ket", "=", "pac")
                ->get();
        return view("pac/ketua/prokja/prokja", compact('prokja'))->with(["user" => $user]);
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
        return view('pac.ketua.dt_prpk.dt_prpk', compact('prpk'))->with(["user" => $user]);
    }

    //data pac
    public function lihat_pac(Request $request, $id)
    {
        $user = Auth::User();
        $pac = Pac::find($id);
        return view('pac/ketua/dt_pac/dt_pac', compact('pac'))->with(["user" => $user]);
    }

    public function update_pac(Request $request, $id)
    {
        
        $validated = $request->validate([
            'ttd_ketua'        => 'nullable|mimes:png',
            'file_sp'          => 'nullable|mimes:pdf',
        ],
        [
            'ttd_ketua.mimes:png' => 'TTD harus dalam bentuk format PNG!',
            'file_sp.mimes:pdf'        => 'File Surat Pengesahan harus dalam bentuk format PDF!',
        ]);

        $pac = Pac::find($id);

        $newTtd = $pac->ttd_ketua;
        $newFile = $pac->file_sp;
        $pathFile = public_path('arsip_PAC/File_SP/ . $newFile');
        $pathTtd = public_path('arsip_PAC/Ttd_ketua/ . $newTtd');

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
        else if ($request->hasFile('ttd_ketua'))
        {
            @unlink($pathTtd);

            $ttd = $request->file('ttd_ketua');
            $ttd_ext = $ttd->getClientOriginalExtension();
            $newTtd = 'Ttd_ketua' . '.' . $ttd_ext;
            $pathTtd = 'arsip_PAC/Ttd_ketua/';
            $ttd->move($pathTtd, $newTtd);
            $pac->ttd_ketua = $newTtd;
        }
        else
        {
            $pac->file_sp = $request->old_file;
            $pac->ttd_ketua = $request->old_ttd;
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


}
