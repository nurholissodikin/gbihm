<?php

namespace App\Imports;

use App\Ptamu;
use Maatwebsite\Excel\Concerns\ToModel;

class PtamuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ptamu([
            //
            'idtamu' => $row[0],
            'namalengkap' => $row[1],
            'namapanggilan' => $row[2],
            'jeniskelamin' => $row[3],
            'notelp' => $row[4],
            'jabatan' => $row[5],
            'demonisasi' => $row[6],
            'gereja' => $row[7],
            'keterangan' => $row[8],
        ]);
    }
}
