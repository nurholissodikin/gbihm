<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    //
    protected $table = 'penyerahan_anak';
    protected $primaryKey = 'idpenyanak';
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
    'idpersonal',
	'idpersonalanak',
	'idcabangranting',
	'idpelayan',
	'noakta',
	'tanggal',
	'dokumen',
	'usercreated',
	'userupdated',
	'active',
    'alamattinggal', 
    'rtrw',  
    'kecamatan',  
    'kelurahan',  
    'kabkota',  
    'provinsi',  
    'kodepos',
    'negara',
    'd_aktakelahiran',
    'd_kk',
    'd_ktp_ayah',
    'd_ktp_ibu',
    'd_kkj',
    'd_foto1',
    'd_foto2',
    'd_kawin',
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
    'keterangan',
    'status'];

	 public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function personalanak()
    {
    	return $this->belongsTo('App\Personal','idpersonalanak','idpersonal');
    }
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
    public function pelayan()
    {
    	return $this->belongsTo('App\Personal','idpelayan','idpersonal');
    }
}
