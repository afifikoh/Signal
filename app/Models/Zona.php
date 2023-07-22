<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = [
        'id',
        'id_kec',
        'nama_zona',
        'koor_zona',
    ];
    use HasFactory;
}
