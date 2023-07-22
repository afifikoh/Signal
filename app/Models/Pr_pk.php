<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pr_pk extends Model
{
    protected $fillable = [
        'id',
        'id_ranting',
        'id_zona',
        'no_sp_ipnu',
        'masa_khidmat_ipnu',
        'berlaku_sp_ipnu',
        'file_sp_ipnu',
        'ketua_ipnu',
        'sekretaris_ipnu',
        'masa_khidmat_ippnu',
        'no_sp_ippnu',
        'berlaku_sp_ippnu',
        'file_sp_ippnu',
        'ketua_ippnu',
        'sekretaris_ippnu',
        'sekretariat',
        'facebook',
        'instagram',
        'youtube',
    ];
    
    use HasFactory;

    protected $table = 'pr_pk';

    public function nama_kec()
    {
        return $this->belongsTo(Kecamatan::class , 'id_kecamatan','id');
    } 
}
