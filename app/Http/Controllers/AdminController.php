<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kecamatan;
use App\Models\Pr_pk;
use App\Models\Zona;
use App\Models\Ranting;
use App\Models\User;
use App\Models\Pac;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dt_kec()
    {
        $user = Auth::User();
        $kecamatan = Kecamatan::all();
        return view('admin.dt_kec.kecamatan', compact('kecamatan'))->with(["user" => $user]);
    }

    public function tambah_kec()
    {
        $user = Auth::User();
        return view('admin.dt_kec.tambah_kec')->with(["user" => $user]);
    }

    public function store_kec(Request $request)
    {
        $validated = $request->validate([
            'nama_kecamatan'    => 'required',
        ],
        [
            'nama_kecamatan.required'    => 'Nama Kecamatan tidak boleh kosong!',
        ]);

        $kecamatan = new Kecamatan();
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        
        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/dt_kec');
    }

    public function edit_kec($id)
    {
        $user = Auth::User();
        $kecamatan = Kecamatan::find($id);
        return view('admin.dt_kec.edit_kec', compact('kecamatan'))->with(["user" => $user]);
    }

    public function update_kec(Request $request, $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->update();
        
        toastr()->success('Data Berhasil Diubah!', 'Selamat');
        return redirect('/dt_kec');
    }

    public function destory_kec(Request $request, $id)
    {
        $kecamatan = Kecamatan::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dt_kec');
    }

    public function dt_zona()
    {
        $user = Auth::User();
        $zona = DB::table("zonas")
                ->leftJoin("kecamatans", "zonas.id_kec", "=", "kecamatans.id")
                ->get();
        return view('admin.dt_zona.zona', compact('zona'))->with(["user" => $user]);
    }

    public function dt_ranting()
    {
        $user = Auth::User();
        $ranting = DB::table("rantings")
                   ->leftJoin("kecamatans", "rantings.id_kec", "=", "kecamatans.id")
                   ->leftJoin("zonas", "rantings.id_zona", "=", "zonas.id")
                   ->get();
        return view('admin.dt_ranting.ranting', compact('ranting'))->with(["user" => $user]);
    }

    

    public function dtpac(Request $request)
    {
        $user = Auth::User();
        $pac = DB::table("pac")
                ->leftJoin("kecamatans", "pac.id_kec", "=", "kecamatans.id")
                ->select(
                    "pac.id",
                    "pac.id_kec",
                    "kecamatans.nama_kecamatan",
                    "pac.nama_organisasi",
                )
                ->get();
        return view('admin.dt_pac.dt_pac', compact('pac'))->with(["user" => $user]);
    }

    public function tambah_dtpac()
    {
        $user = Auth::User();
        $kec = Kecamatan::get();
        return view('admin.dt_pac.tambah_dtpac', compact('kec'))->with(["user" => $user]);
    }

    public function store_dtpac(Request $request)
    {
        $validated = $request->validate([
            'id_kec'    => 'required',
            'nama_organisasi'    => 'required',
        ],
        [
            'id_kec.required'    => 'Kecamatan tidak boleh kosong!',
            'nama_organisasi.required'    => 'Nama Organisasi tidak boleh kosong!',
        ]);

        $pac = new Pac();
        $pac->id_kec = $request->id_kec;
        $pac->nama_organisasi = $request->nama_organisasi;
        $pac->save();
        
        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/dtpac');
    }

    public function edit_dtpac($id)
    {
        $user = Auth::User();
        $pac = Pac::with('nama_kec')->find($id);
        // $pac = Pac::find($id)->leftjoin('kecamatans','pac.id_kec','=','kecamatans.id');
        $kec = Kecamatan::get();
        return view('admin.dt_pac.edit_dtpac', compact('pac','kec'))->with(["user" => $user]);
    }

    public function update_dtpac(Request $request, $id)
    {
        $validated = $request->validate([
            'id_kec'    => 'required',
            'nama_organisasi'    => 'required',
        ],
        [
            'nama_kecamatan.required'    => 'Nama Kecamatan tidak boleh kosong!',
            'nama_organisasi.required'    => 'Nama Organisasi tidak boleh kosong!',
        ]);

        $pac = Pac::find($id);
        $pac->id_kec = $request->id_kec;
        $pac->nama_organisasi = $request->nama_organisasi;
        $pac->update();
        
        toastr()->success('Data Berhasil Diubah!', 'Selamat');
        return redirect('/dtpac');
    }

    public function destory_dtpac(Request $request, $id)
    {
        $pac = Pac::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dtpac');
    }

    public function dtprpk(Request $request)
    {
        $user = Auth::User();
        $prpk = DB::table("pr_pk")
                ->leftJoin("kecamatans", "pr_pk.id_kecamatan", "=", "kecamatans.id")
                ->select(
                    "pr_pk.id",
                    "pr_pk.id_kecamatan",
                    "kecamatans.nama_kecamatan",
                    "pr_pk.nama_organisasi",
                    "pr_pk.prpk",
                )
                ->get();
        return view('admin.dt_prpk.dt_prpk', compact('prpk'))->with(["user" => $user]);
    }

    public function tambah_dtprpk()
    {
        $user = Auth::User();
        $kec = Kecamatan::get();
        return view('admin.dt_prpk.tambah_dtprpk', compact('kec'))->with(["user" => $user]);
    }

    public function store_dtprpk(Request $request)
    {
        $validated = $request->validate([
            'id_kecamatan'    => 'required',
            'nama_organisasi'    => 'required',
            'prpk'    => 'required',
        ],
        [
            'id_kecamatan.required'    => 'Nama Kecamatan tidak boleh kosong!',
            'nama_organisasi.required'    => 'Nama Organisasi tidak boleh kosong!',
            'prpk.required'    => 'Nama Ranting/Komisariat tidak boleh kosong!',
        ]);

        $prpk = new Pr_pk();
        $prpk->id_kecamatan = $request->id_kecamatan;
        $prpk->prpk = $request->prpk;
        $prpk->nama_organisasi = $request->nama_organisasi;
        $prpk->save();
        
        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/dtprpk');
    }

    public function edit_dtprpk($id)
    {
        $user = Auth::User();
        $prpk = Pr_pk::with('nama_kec')->find($id);
        // $pac = Pac::find($id)->leftjoin('kecamatans','pac.id_kec','=','kecamatans.id');
        $kec = Kecamatan::get();
        return view('admin.dt_prpk.edit_dtprpk', compact('prpk','kec'))->with(["user" => $user]);
    }

    public function update_dtprpk(Request $request, $id)
    {
        $validated = $request->validate([
            'id_kecamatan'    => 'required',
            'nama_organisasi'    => 'required',
        ],
        [
            'id_kecamatan.required'    => 'Nama Kecamatan tidak boleh kosong!',
            'nama_organisasi.required'    => 'Nama Organisasi tidak boleh kosong!',
        ]);

        $prpk = Pr_pk::find($id);
        $prpk->id_kecamatan = $request->id_kecamatan;
        $prpk->prpk = $request->prpk;
        $prpk->nama_organisasi = $request->nama_organisasi;
        $prpk->update();
        
        toastr()->success('Data Berhasil Diubah!', 'Selamat');
        return redirect('/dtprpk');
    }

    public function destory_dtprpk(Request $request, $id)
    {
        $prpk = Pr_pk::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dtprpk');
    }

    public function dt_prpk(Request $request)
    {
        $user = Auth::User();
        $prpk = DB::table("users")
                ->leftJoin("pr_pk", "users.id_ket", "=", "pr_pk.id")
                ->where("users.level", "=", "pr/pk")
                ->leftJoin("rantings", "pr_pk.id_ranting", "=", "rantings.id")
                ->leftJoin("kecamatans", "rantings.id_kec", "=", "kecamatans.id")
                ->select(
                    "users.nama",
                    "users.id",
                    "users.level",
                    "users.email",
                    "rantings.id",
                    "rantings.id_kec",
                    "pr_pk.id",
                    "pr_pk.id_ranting",
                    "rantings.nama_ranting",
                    "kecamatans.nama_kecamatan",
                )
                ->get();
        return view('admin.prpk.user_prpk', compact('prpk'))->with(["user" => $user]);
    }

    public function dt_pac(Request $request)
    {
        $user = Auth::User();
        $pac = DB::table("users")
                ->leftJoin("pac", "users.id_ket", "=", "pac.id")
                ->where("users.level", "!=", "Admin")
                ->where("users.level", "!=", "pr/pk")
                ->leftJoin("kecamatans", "pac.id_kec", "=", "kecamatans.id")
                ->select(
                    "users.nama",
                    "users.id",
                    "users.level",
                    "users.email",
                    "pac.id",
                    "pac.id_kec",
                    "kecamatans.nama_kecamatan",
                    "pac.nama_organisasi",
                )
                ->get();
        return view('admin.pac.user_pac', compact('pac'))->with(["user" => $user]);
    }
    
    public function tambah_userpac()
    {
        $user = Auth::User();
        $pac = Pac::get();
        return view('admin.pac.tambah_pac', compact('pac'))->with(["user" => $user]);
    }

    public function store_userpac(Request $request)
    {
        $validated = $request->validate([
            'id_ket'    => 'required',
            'email'    => 'required',
            'password'    => 'required',
            'level'    => 'required',
            'nama'    => 'required',
        ],
        [
            'id_ket.required'    => 'Nama Organisasi tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'password.required'    => 'Password tidak boleh kosong!',
            'level.required'    => 'Level tidak boleh kosong!',
            'nama.required'    => 'Nama akun tidak boleh kosong!',
        ]);

        $userpac = new User();
        $userpac->nama = $request->nama;
        $userpac->ket = $request->ket;
        $userpac->id_ket = $request->id_ket;
        $userpac->email = $request->email;
        $userpac->password = Hash::make($request->password);
        $userpac->level = $request->level;
        $userpac->save();

        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/dt_pac');
    }

    public function edit_userpac($id)
    {
        $user = Auth::User();
        $userpac = User::with('nama_orgpac')->find($id);
        $pacs = Pac::get();
        return view('admin.pac.edit_userpac', compact('userpac','pacs'))->with(["user" => $user]);
    }

    public function destory_userpac(Request $request, $id)
    {
        $pac = User::where('id',$id)->delete();
        toastr()->success('Data Berhasil Dihapus!', 'Selamat');
        return redirect('dt_pac');
    }

    public function userprpk(Request $request)
    {
        $user = Auth::User();
        $prpk = DB::table("users")
                ->leftJoin("pr_pk", "users.id_ket", "=", "pr_pk.id")
                ->where("users.level", "=", "pr/pk")
                ->leftJoin("kecamatans", "pr_pk.id_kecamatan", "=", "kecamatans.id")
                ->select(
                    "users.nama",
                    "users.id",
                    "users.level",
                    "users.email",
                    "pr_pk.id",
                    "pr_pk.prpk",
                    "pr_pk.id_kecamatan",
                    "kecamatans.nama_kecamatan",
                    "pr_pk.nama_organisasi",
                )
                ->get();
        return view('admin.prpk.user_prpk', compact('prpk'))->with(["user" => $user]);
    }

    public function tambah_userprpk()
    {
        $user = Auth::User();
        $prpk = Pr_pk::get();
        return view('admin.prpk.tambah_prpk', compact('prpk'))->with(["user" => $user]);
    }

    public function store_userprpk(Request $request)
    {
        $validated = $request->validate([
            'id_ket'    => 'required',
            'email'    => 'required',
            'password'    => 'required',
            'level'    => 'required',
            'nama'    => 'required',
        ],
        [
            'id_ket.required'    => 'Nama Organisasi tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'password.required'    => 'Password tidak boleh kosong!',
            'level.required'    => 'Level tidak boleh kosong!',
            'nama.required'    => 'Nama akun tidak boleh kosong!',
        ]);

        $userpac = new User();
        $userpac->nama = $request->nama;
        $userpac->id_ket = $request->id_ket;
        $userpac->id_kec = $request->id_kec;
        $userpac->ket = $request->ket;
        $userpac->email = $request->email;
        $userpac->password = Hash::make($request->password);
        $userpac->level = $request->level;
        $userpac->save();

        toastr()->success('Data Berhasil Ditambahkan!', 'Selamat');
        return redirect('/userprpk');
    }

    public function edit_userprpk()
    {
        $user = Auth::User();
        $prpk = Pr_pk::with('nama_orgprpk')->get();
        return view('admin.prpk.edit_userprpk', compact('prpk'))->with(["user" => $user]);
    }





}
