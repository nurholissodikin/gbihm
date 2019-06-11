<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayahibu extends Model
{
    //
    protected $table = 'ayahibu';
    protected $primaryKey = 'id';
    protected $fillable = [
	'idpersonal',
	'idayahper',
	'namadepan',
	'namatengah',
	'namabelakang',
	'usercreated',
	'userupdated',
	'active', 
  'idibuper',
  'namadepanibu',
  'namatengahibu',
  'namabelakangibu'
	];

	public function personal()
    {
      return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function baptisanayah()
    {
      return $this->hasMany('App\Baptisanair','idayahibubap','id');
    }
    // public function nikahibu()
    // {
    //   return $this->hasMany('App\Nikah','idibu','id');
    // }
     public function nikahayah()
    {
      return $this->hasMany('App\Nikah','idayah','id');
    }
}
