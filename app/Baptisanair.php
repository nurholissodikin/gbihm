<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptisanair extends Model
{
    //
    protected $table= 'baptisan_air';
    protected $primaryKey = 'idbaptisan';
    protected $fillable = [

	'idpersonal',
	'idayahibubap',
	'idcabangranting',
	'idpelayan',
	'noakta',
	'baptisanair',
	'tanggal',
	'dokumen',
	'usercreated',
	'userupdated',
	'active',
	'idkkj',
	'd_aktakelahiran',
	'd_ktppass',
	'd_kk',
	'd_kkj',
	'd_foto1',
	'd_foto2',
	'd_perceraian',
	'd_saksi1',
	'd_saksi2',
	'd_sp_ortu',
	'd_ktp_ortu',
	'd_kawin_ortu',
	'd_sp_agama',
	'd_ttd_baptisan',
	'd_berita',
	'd_pendaftaran',
	'd_lain',
	'keterangan',
	'idayahibubap',
	'status'
	];

	public function personal()
    {
      	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function pelayan()
    {
      	return $this->belongsTo('App\Personal','idpelayan','idpersonal');
    }
    public function ayahp()
    {
      	return $this->belongsTo('App\Ayahibu','idayahibubap','id');
    }
    public function cabap()
    {
    	return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }

}
