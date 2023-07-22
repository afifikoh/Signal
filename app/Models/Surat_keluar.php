<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    protected $fillable = [
        'id',
        'pac_id',
        'tgl_surat',
        'jns_surat',
        'no_surat',
        'tujuan_surat',
        'tgl_isi',
        'perihal',
        'isi_surat',
        'status',
        'file',
    ];

    use HasFactory;

    protected $table = 'surat_keluar';
}
