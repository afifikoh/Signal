<?php

namespace App\Imports;

use App\Models\Surat_masuk;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuratMasukImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Surat_masuk([
            'pac_id'=> Auth::user()->id,
            'tgl_masuk'=> $row[0],
            'tgl_surat'=> $row[1],
            'no_surat'=> $row[2],
            'perihal'=> $row[3],
            'isi_surat'=> $row[4],
            'pengirim'=> $row[5],
            'file'=>null,
        ]);
    }
}
