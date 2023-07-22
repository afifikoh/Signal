<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pac extends Model
{
    protected $fillable = [ 
        'id',
        'id_kec',
        'nama_organisasi',
        'masa_khidmat',
        'no_sp',
        'berlaku_sp',
        'file_sp',
        'ketua',
        'sekretaris',
        'ttd_ketua',
        'ttd_sekretaris',
        'cap_organisasi',
        'kop_surat',
    ];

    use HasFactory;

    protected $table = 'pac';

    public function nama_kec()
    {
        return $this->belongsTo(Kecamatan::class , 'id_kec','id');
    }  
}
