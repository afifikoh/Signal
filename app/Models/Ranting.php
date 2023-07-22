<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $fillable = [
        'id',
        'id_kev',
        'id_zona',
        'nama_ranting',
    ];
    
    use HasFactory;
}
