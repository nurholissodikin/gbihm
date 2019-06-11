<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneguhan extends Model
{
    //

    protected $table = 'peneguhan';
    protected $primaryKey = 'idpeneguhan';
    protected $fillable = [
  	
	'idpersonal',
	'idpasangan',
	'idcabangranting',
	'idpelayan',
	'noakta',
	'tempatpernikahan',
	'tanggal',
	'dokumen',
	'usercreated',
	'userupdated',
	'created_at',
	'updated_at',
	'active',
	'idayahibupas',
	'idayahibuper',
	'd_aktakelahiran',
	'd_kk',
	'd_ktp_ayah',
	'd_ktp_ibu',
	'd_kkj',
	'd_foto1',
	'd_foto2',
	'd_kawin_ortu',
	'd_perceraian',
	'd_sp_ortu',
	'd_saksi1',
	'd_saksi2',
	'd_ttd_anak',
	'd_pendaftaran',
	'd_lain',
	'status',
	'menyatakan',
	'penerima',
	'verifikasi',
	'validasi',
	'petugas',
	'keterangan'];
}
