<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subrayon extends Model
{
    //

    protected $table= 'subrayon';
    protected $primaryKey = 'idsubrayon';
    protected $fillable = [
  	'idrayon',
  	'subrayon', 
    'usercreated',  
    'userupdated',
	'active',
	'wilayah',
	'kodesubrayon',
	'namasubrayon',
	'pemimpin',
	'wakilpemimpin',
	'jenissubrayon',
	'alamat',
	'rtrw',
	'kecamatan',
	'kelurahan',
	'kota',
	'provinsi',
	'kodepos',
	'negara',
	'googlemap',
	'latitude',
	'longitude',
	'notelepon',
	'fax',
	'email',
	'noref',
	'keterangan'];
	 public function rayon()
    {
      return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
    public function personal()
    {
      return $this->belongsTo('App\Personal','pemimpin','idpersonal');
    }
    public function personala()
    {
      return $this->belongsTo('App\Personal','wakilpemimpin','idpersonal');
    }
    public function provinsia()
    {
      return $this->belongsTo('App\Provinces','provinsi','id');
    }
    public function kabkotaa()
    {
      return $this->belongsTo('App\Regencies','kota','id');
    }
     public function kecamatana()
    {
      return $this->belongsTo('App\Districts','kecamatan','id');
    }
     public function kelurahana()
    {
      return $this->belongsTo('App\Villages','kelurahan','id');
    }
     public function saldo()
    {
        return $this->hasMany('App\Saldo','idsubrayon','idsubrayon');
    }
    public function cabang()
    {
        return $this->hasMany('App\Cabang','idsubrayon','idsubrayon');
    }
     public function kebaktian()
    {
        return $this->hasMany('App\Kebaktian','idsubrayon','idsubrayon');
    }
    public function komisi()
    {
        return $this->hasMany('App\Komisi','idsubrayon','idsubrayon');
    }
    public function ibadahraya()
    {
        return $this->hasMany('App\Ibadahraya','idsubrayon','idsubrayon');
    }
    public function coolpengerja()
    {
        return $this->hasMany('App\Coolpengerja','idsubrayon','idsubrayon');
    }

}
