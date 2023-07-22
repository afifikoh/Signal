<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>Hash::make("admin"),
            "level"=>"Admin",
        ]);

        User::create([
            "nama"=>"Sekretaris IPNU",
            "id_ket"=>"1",
            "id_kec"=>"1",
            "ket"=>"kecamatan",
            "email"=>"sekretarisipnu@gmail.com",
            "password"=>Hash::make("111"),
            "level"=>"Sekretaris",
        ]);

        User::create([
            "nama"=>"Koordinator Zona 1",
            "id_ket"=>"1",
            "id_kec"=>"1",
            "ket"=>"kecamatan",
            "email"=>"koorzona1@gmail.com",
            "password"=>Hash::make("111"),
            "level"=>"Koor_zona",
        ]);

        User::create([
            "nama"=>"Sekretaris IPPNU",
            "id_ket"=>"2",
            "id_kec"=>"1",
            "ket"=>"kecamatan",
            "email"=>"sekretarisippnu@gmail.com",
            "password"=>Hash::make("111"),
            "level"=>"Sekretaris",
        ]);

        User::create([
            "nama"=>"Ketua IPNU",
            "id_ket"=>"1",
            "id_kec"=>"1",
            "ket"=>"kecamatan",
            "email"=>"ketuaipnu@gmail.com",
            "password"=>Hash::make("111"),
            "level"=>"Ketua",
        ]);

        User::create([
            "nama"=>"Ketua IPPNU",
            "id_ket"=>"2",
            "id_kec"=>"1",
            "ket"=>"kecamatan",
            "email"=>"ketuaippnu@gmail.com",
            "password"=>Hash::make("111"),
            "level"=>"Ketua",
        ]);

    }
}
