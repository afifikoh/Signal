<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekreController;
use App\Http\Controllers\KetuaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () { return view ('landing_page.index'); });
Route::get('/blog', function () { return view ('landing_page/blog'); });

Route::get("/home", [LayoutController::class, "index"])->middleware("auth");
Route::get("/beranda", [LayoutController::class, "index"])->middleware("auth");

Route::controller(LoginController::class)->group(function () {
    Route::get("login", "index")->name("login");
    Route::post("login/proses", "proses");
    Route::get("logout", "logout");
});

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["ceklevel:Admin"] ], function () {
        Route::get("/dt_kec", [AdminController::class, 'dt_kec','tambah_kec','store_kec','update_kec','destory_kec']);
        Route::get("/tambah_kec", [AdminController::class, 'tambah_kec']);
        Route::post("/kec-add", [AdminController::class, 'store_kec']);
        Route::get("/edit_kec/{id}", [AdminController::class, 'edit_kec']);
        Route::post("/kec-update/{id}", [AdminController::class, 'update_kec']);
        Route::get("/kec-hapus/{id}", [AdminController::class, 'destory_kec']);

        Route::get("/dtpac", [AdminController::class, 'dtpac','tambah_dtpac','store_dtpac','update_dtpac']);
        Route::get("/tambah_dtpac", [AdminController::class, 'tambah_dtpac']);
        Route::post("/dtpac-add", [AdminController::class, 'store_dtpac']);
        Route::get("/edit_dtpac/{id}", [AdminController::class, 'edit_dtpac']);
        Route::post("/dtpac-edit/{id}", [AdminController::class, 'update_dtpac']);
        Route::get("/dtpac-hapus/{id}", [AdminController::class, 'destory_dtpac']);

        Route::get("/dtprpk", [AdminController::class, 'dtprpk','store_dtprpk','update_dtprpk']);
        Route::get("/tambah_dtprpk", [AdminController::class, 'tambah_dtprpk']);
        Route::post("/dtprpk-add", [AdminController::class, 'store_dtprpk']);
        Route::get("/edit_dtprpk/{id}", [AdminController::class, 'edit_dtprpk']);
        Route::post("/dtprpk-edit/{id}", [AdminController::class, 'update_dtprpk']);
        Route::get("/dtprpk-hapus/{id}", [AdminController::class, 'destory_dtprpk']);


        Route::get("/dt_zona", [AdminController::class, 'dt_zona']);
        Route::get("/dt_ranting", [AdminController::class, 'dt_ranting']);
        
        Route::get("/dt_pac", [AdminController::class, 'dt_pac','tambah_userpac']);
        Route::get("/dt_prpk", [AdminController::class, 'dt_prpk']);
        Route::get("/tambah_userpac", [AdminController::class, 'tambah_userpac']);
        Route::post("/userpac-add", [AdminController::class, 'store_userpac']);
        Route::get("/edit_userpac/{id}", [AdminController::class, 'edit_userpac']);
        Route::get("/userpac-hapus/{id}", [AdminController::class, 'destory_userpac']);

        Route::get("/userprpk", [AdminController::class, 'userprpk']);
        Route::get("/tambah_userprpk", [AdminController::class, 'tambah_userprpk']);
        Route::post("/userprpk-add", [AdminController::class, 'store_userprpk']);




    });
    Route::group(["middleware" => ["ceklevel:Sekretaris"] ], function () {
        Route::get("/dt_srtmasuk", [SekreController::class, 'dt_srtmasuk','tambah_srtmasuk','store_srtmasuk','edit_srtmasuk','update_srtmasuk']);
        Route::get("/tambah_srtmasuk", [SekreController::class, 'create_srtmasuk']);
        Route::post("/srtmasuk-add", [SekreController::class, 'store_srtmasuk']);
        Route::get("/detail_srtmasuk/{id}", [SekreController::class, 'detail_srtmasuk']);
        Route::get("/edit_srtmasuk/{id}", [SekreController::class, 'edit_srtmasuk']);
        Route::post("/srtmasuk-update/{id}", [SekreController::class, 'update_srtmasuk']);
        Route::get("/hapus_srtmasuk/{id}", [SekreController::class, 'destory_srtmasuk']);
        Route::post("/import_excel", [SekreController::class, 'import_excel']);
        // Route::post("/srtmasuk-update/{id}", [SekreController::class, 'update_srtmasuk']);

        // Route::get("/data_pac", [SekreController::class, 'data_pac']);
        Route::get("/lihat_pac/{id}", [SekreController::class, 'lihat_pac']);
        Route::post("/ubah_pac/{id}", [SekreController::class, 'update_pac']);

        Route::get("/data_prpk", [SekreController::class, 'data_prpk']);
        Route::get("/tambahh_userprpk", [AdminController::class, 'tambah_userprpk']);


        Route::get("/data_prokjapac", [SekreController::class, 'data_prokjapac']);
        Route::get("/tambah_prokjapac", [SekreController::class, 'tambah_prokjapac']);
        Route::post("/prokjapac-add", [SekreController::class, 'store_prokjapac']);

        Route::get("/data_kegpac", [SekreController::class, 'data_kegpac']);
        Route::get("/tambah_kegpac", [SekreController::class, 'tambah_kegpac']);


        Route::get("/cetak_prokja", [SekreController::class, 'cetak_prokja']);
    });
    Route::group(["middleware" => ["ceklevel:Ketua"] ], function () {
        Route::get("/dtt_srtmasuk", [KetuaController::class, 'dtt_srtmasuk']);
        Route::get("/detail_srtmasuk/{id}", [KetuaController::class, 'detail_srtmasuk']);
        Route::get("/dataa_prokjapac", [KetuaController::class, 'data_prokjapac']);
        Route::get("/dataa_prpk", [KetuaController::class, 'data_prpk']);
        Route::get("/lihatt_pac/{id}", [KetuaController::class, 'lihat_pac']);
        Route::post("/ubah_pac/{id}", [KetuaController::class, 'update_pac']);





    });

    // Route::get('/home', function () {
    //     return view('layout/dashboard');
    // });
});






