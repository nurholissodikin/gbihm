<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nikah extends Model
{
    //
    protected $table = 'pernikahan';
    protected $primaryKey = 'idpernikahan';
    protected $fillable = [
  	'idpersonal',
  	'idpasangan',
  	'idcabangranting',
  	'idpelayan',
  	'idayah',
  	'idibu',
  	'noakta',
  	'tempatpernikahan',
  	'tanggal',
  	'dokumen',
  	'usercreated',
  	'userupdated',
  	'active']; 

	  public function personal()
    {
      return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function pelayan()
    {
      return $this->belongsTo('App\Personal','idpelayan','idpersonal');
    }
    public function pasangan()
    {
      return $this->belongsTo('App\Personal','idpasangan','idpersonal');
    }
    public function cabang()
    {
      return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
    public function ayah()
    {
      return $this->belongsTo('App\Ayahibu','idayah','id');
    }
    public function ibu()
    {
      return $this->belongsTo('App\Ayahibu','idibu','id');
    }
}
