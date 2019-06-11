<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    //

    protected $table= 'divisi';
    protected $primaryKey = 'iddivisi';
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
  	'kodedivisi',
  	'namadivisi',
  	'pemimpin',
  	'wakilpemimpin',
  	'jenisdivisi',
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
  	'keterangan',
  	'status',
  	'usercreated',
  	'userupdated'
];


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
        return $this->hasMany('App\Saldo','iddivisi','iddivisi');
    }
}
