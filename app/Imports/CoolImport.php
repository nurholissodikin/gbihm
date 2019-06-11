<?php

namespace App\Imports;

use App\Personal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use App\Pendidikan;
use App\Pelayanan;
use App\Jabatanpelayanan;

class CoolImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $tahun = date('Y-m-d', strtotime($row[2]));
        // $pisah = explode('-', $tahun);
        // $thn = $pisah[0];
        // $bln = $pisah[1];
        // $tgl = $pisah[2];


        // $ayeuna = Carbon::now();
        // $x = $ayeuna->format('Y-m-d');
        // $pisaha = explode('-', $x);
        // $tgla = $pisaha[2];
       
        // if ($row[3] == 'P') {
        //     $j = 3;
        // }else
        // {
        //     $j = 1;
        // }

        // $b= Personal::all();
        // $count=count($b);
        // $idp=$count+1;
       
        // $year = substr( $thn, -2);
 
        // $id = 1;

        //  $last_pen = Pendidikan::orderBy('idpendidikan','DESC')->first();
        // $idpendidikan = ($last_pen != null) ? $last_pen->idpendidikan+1: '1';

        
     
     dd($row);

        // $pendidikan =  new Pendidikan([
        //     'idpendidikan' => $idpendidikan,
        //     'idpersonal' => $personal->idpersonal,
        //     'tingkatpendidikan'=>$row[10],

        // ]);

        // $pelayanan =  new Pelayanan([
        // 'idpersonal'=>$personal->idpersonal,

        // ]);

        // $pt = new Jabatanpelayanan([
        // 'idpersonal'=>$personal->idpersonal,
        // 'jabatan'=>$row[11],
        // 'idrayon'=>$row[12],
        // 'idsubrayon'=>$row[13],
        // 'idcabangranting'=>$row[14],
        // 'idpelayanan'=>$pelayanan->id,
        // 'jeniscool'=>$row[15],
        // 'jabatankependetaan'=>$row[16],

        // ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
