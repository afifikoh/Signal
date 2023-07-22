<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prokja extends Model
{
    protected $fillable = [
        'id',
        // 'nama_keg',
        // 'tempat_keg',
        // 'tgl_keg',
        // 'penyelenggara',
        // 'pelaksana',
        // 'user_id',
        'id_ket',
        'ket',
        'id_kec',
        'jangka',
        'nama_keg',
        'tgl_keg',
        'target',
        'output',
        'mitra',
        'departemen',
        'status',
    ];
    use HasFactory;

    

}
