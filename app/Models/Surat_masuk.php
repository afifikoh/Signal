<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_masuk extends Model
{
    protected $fillable = [
        'id',
        'pac_id',
        'tgl_masuk',
        'tgl_surat',
        'no_surat',
        'perihal',
        'isi_surat',
        'pengirim',
        'file',
    ];

    use HasFactory;

    protected $table = 'surat_masuk';
}
