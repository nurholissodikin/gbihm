<?php

namespace App\Imports;

use App\jabatan;
use Maatwebsite\Excel\Concerns\ToModel;

class JabatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jabatan([
            'kode_jabatan' => $row[0],
            'usercreated' => $row[1],
            'jabatan' => $row[2],
            
        ]);
    }
}
