<?php

namespace App\Imports;

use App\Personal;
use Carbon\Carbon;
use App\Pendidikan;
use App\Pelayanan;
use App\Jabatanpelayanan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;


class PengerjaImport implements ToModel, WithHeadingRow, WithProgressBar
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {
        $personal = new Personal;
            //
            $tahun = date('Y-m-d', strtotime($row['tanggal_lahir']));
        $pisah = explode('-', $tahun);
        $thn = $pisah[0];
        $bln = $pisah[1];
        $tgl = $pisah[2];

        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[2];
       
        if ($row['jenis_kelamin'] == 'P') {
            $j = 3;
        }else
        {
            $j = 1;
        }

        $b= Personal::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);
 
        $id = $tgla.$year.$j.$bln.$tgl.$idp;

         $last_pen = Pendidikan::orderBy('idpendidikan','DESC')->first();
        $idpendidikan = ($last_pen != null) ? $last_pen->idpendidikan+1: '1';


        
            $personal->idpersonal = $id;
            $personal->namalengkap = $row['nama_lengkap'];
            $personal->namadepan = $row['nama_depan_sesuai_ktp'];
            $personal->namatengah = $row['nama_tengah_sesuai_ktp'];
            $personal->namapanggilan = $row['nama_panggilan'];
            $personal->jeniskelamin = $row['jenis_kelamin'];
            $personal->alamattinggal = $row['alamat'];
            $personal->kodepos = $row['kode_pos'];
            $personal->email = $row['email'];
            $personal->tempatlahir = $row['tempat_lahir'];
            $personal->tanggallahir = $tahun;
            $personal->notelp = $row['no_telepon'];
            $personal->nohp = $row['no_hp'];
            $personal->golongandarah = $row['golongan_darah'];
            $personal->baptisrohkudus = $row['baptis_roh_kudus'];
            $personal->keanggotaan = $row['internaleksternal'];
            $personal->statusperkawinan = $row['golongan_darah'];
            $personal->nokkj = $row['no_kkj'];
          
            $personal->save();
           

       

            $pendidikan = new Pendidikan;
            $pendidikan->idpendidikan = $idpendidikan;            
            $pendidikan->idpersonal = $personal->idpersonal;
            $pendidikan->tingkatpendidikan=$row['pendidikan_terakhir'];
            $pendidikan->save();

     

        $pelayanan =  new Pelayanan;
       $pelayanan->idpersonal=$personal->idpersonal;
        $pelayanan->nosertifikat = $row['no_sertifikat'];
       

        $pelayanan->save();

        $pt =  new Jabatanpelayanan;
        $pt->idpersonal=$personal->idpersonal;
        $pt->jabatan=$row['jabatan'];
        $pt->sejak=$row['sejak_tahun'];
        $pt->nosertifikat=$row['nomor'];
        $pt->idcabangranting=$row['cabang'];
        $pt->idpelayanan=$pelayanan->id;
        $pt->jeniscool=$row['sub_rayon'];
        $pt->idrayon=$row['rayon'];
        $pt->save();

     
    }
    public function headingRow(): int
    {
        return 2;
    }
}
