<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    //
    protected $table= 'cabang_ranting';
    protected $primaryKey = 'idcabangranting';
    protected $casts = ['rt' => 'array'];
    protected $fillable = [
  	'idsubrayon',
  	'cabangranting', 
    'usercreated',  
    'userupdated',
  	'active',
  	'idrayon',
  	'wailayah',
  	'kodecabang',
  	'namacabang',
  	'pemimpin',
  	'wakilpemimpin',
  	'jeniscabang',
  	'alamat',
  	'rt',
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
  	'perjamuan',
  	'noref',
  	'keterangan'];

     public function rayon()
    {
      return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
     public function subrayon()
    {
      return $this->belongsTo('App\Subrayon','idsubrayon','idsubrayon');
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
     public function kebaktian()
    {
        return $this->hasMany('App\Kebaktian','idcabangranting','idcabangranting');
    }
    public function saldo()
    {
        return $this->hasMany('App\Saldo','idcabangranting','idcabangranting');
    }
    public function keanggotaan()
    {
        return $this->hasMany('App\Keanggotaan','idcabangranting','idcabangranting');
    }
    public function diserahkan()
    {
        return $this->hasMany('App\Diserahkan','idcabangranting','idcabangranting');
    }
    public function baptisanair()
    {
        return $this->hasMany('App\Baptisanair','idcabangranting','idcabangranting');
    }
     public function komisi()
    {
      return $this->hasMany('App\Komisi','idcabangranting','idcabangranting');
    }
     public function kegiatan()
    {
      return $this->hasMany('App\Kegiatan','idcabangranting','idcabangranting');
    }
     public function ibadahraya()
    {
      return $this->hasMany('App\Ibadahraya','idcabangranting','idcabangranting');
    }
    public function coolpengerja()
    {
      return $this->hasMany('App\Coolpengerja','idcabangranting','idcabangranting');
    }  
    public function user()
    {
      return $this->hasMany('App\User','cabang_id','idcabangranting');
    }     
}
