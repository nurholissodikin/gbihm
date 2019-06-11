<?php

namespace App\Imports;

use App\Ptamukhusus;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class PtamukhususImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tahun = date('Y-m-d', strtotime($row[12]));
        $pisah = explode('-', $tahun);
        $thn = $pisah[0];

        $bln = $pisah[1];
        $tgl = $pisah[2];


        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[2];
       
        if ($row[3] == 'P') {
            $j = 3;
        }else
        {
            $j = 1;
        }

        $b= Ptamukhusus::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);
 
    
        $id = $tgla.$year.$j.$bln.$tgl.$idp;
        return new Ptamukhusus([
            //

        
            'idtamukhusus' => $id,
            'namalengkap'=> $row[1],
            'namapanggilan'=> $row[2],
            'jeniskelamin'=> $row[3],
            'nik'=> $row[4],
            'jabatan'=> $row[5],
            'gereja'=> $row[6],
            'email'=> $row[7],
            'jenisbadge'=> $row[8],
            'status'=> $row[9],
            'menyutujui'=> $row[10],
            'mengetahui'=> $row[11],
           'tanggallahir' =>
            date('Y-m-d', strtotime($row[12])),   
        ]);
    }
}
