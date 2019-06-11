<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coolpengerja extends Model
{
    //
    protected $table = 'pengerja_cool';
    protected $primaryKey = 'id';
    protected $fillable = [
    'namalengkap',
	'tanggallahir',
	'kota',
	'kodepos',
	'nohp',
	'baptisrohkudus',
	'statuspernikahan',
	'kom',
	'pendidikan',
	'jabatan',
	'idrayon',
	'idsubrayon',
	'idcabangranting',
	'jenis_cool',
	'jabatankependetaan'
	];

	public function rayon()
	{
		return $this->belongsTo('App\Rayon','idrayon','idrayon');
	}
	public function subrayon()
	{
		return $this->belongsTo('App\Subrayon','idsubrayon','idsubrayon');
	}
	public function cabang()
	{
		return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
	}
	public function jeniscool()
	{
		return $this->belongsTo('App\Tipecool','jeniscool','id');
	}
	public function absensipertemuan()
	{
		return $this->hasMany('App\Absensipertemuan','idpengerja_cool','id');
	}
}
