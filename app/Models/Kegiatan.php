<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        // 'id',
        // 'prokja_id',
        // 'jenis_keg',
        // 'nama_keg',
        // 'tempat_keg',
        // 'tgl_keg',
        // 'penyelenggara',
        // 'pelaksana',
        // 'user_id',
        // 'foto_keg',
            'id',
            'prokja_id',
            'nama_keg',
            'tempat_keg',
            'tgl_keg',
            'pelaksana',
            'berita_acara',
            'foto_keg',
    ];
    
    use HasFactory;

}
