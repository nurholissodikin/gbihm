<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    //\
    protected $table= 'rayon';
    protected $primaryKey = 'idrayon';
    protected $fillable = [
  	'rayon',
  	'active', 
    'usercreated',  
    'userupdated',
  	'wilayah',
  	'koderayon',
  	'namarayon',
  	'peminpin',
  	'wakilpemimpin',
  	'noref',
  	'keterangan'
];

    public function personal(){
      return $this->belongsTo('App\Personal','pemimpin','idpersonal');
    }
    public function personala()
    {
      return $this->belongsTo('App\Personal','wakilpemimpin','idpersonal');
    }
    public function saldo()
    {
        return $this->hasMany('App\Saldo','idrayon','idrayon');
    }
    public function subrayon()
    {
        return $this->hasMany('App\Subrayon','idrayon','idrayon');
    }
    public function cabang()
    {
        return $this->hasMany('App\Cabang','idrayon','idrayon');
    }
    public function kebaktian()
    {
        return $this->hasMany('App\Kebaktian','idrayon','idrayon');
    }
    public function komisi()
    {
        return $this->hasMany('App\Komisi','idrayon','idrayon');
    }
    public function kkmta()
    {
        return $this->hasMany('App\Kkmta','idrayon','idrayon');
    }
    
    public function komujian()
    {
        return $this->hasMany('App\Komujian','idrayon','idrayon');
    }
    public function komlkp()
    {
        return $this->hasMany('App\Komlkp','idrayon','idrayon');
    }
    public function kommagang()
    {
        return $this->hasMany('App\Kommagang','idrayon','idrayon');
    }
    public function komtugas()
    {
        return $this->hasMany('App\Komtugas','idrayon','idrayon');
    }
    public function ibadahraya()
    {
        return $this->hasMany('App\Ibadahraya','idrayon','idrayon');
    }
    public function kelaskom()
    {
        return $this->hasMany('App\Kelaskom','idrayon','idrayon');
    }
    public function guru()
    {
        return $this->hasMany('App\Guru','idrayon','idrayon');
    }
    public function coolpengerja()
    {
        return $this->hasMany('App\Coolpengerja','idrayon','idrayon');
    }
}
