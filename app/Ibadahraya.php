<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibadahraya extends Model
{
    //

    protected $table = 'ibadahraya';
    protected $primaryKey = 'id';
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
    'idrayon',
    'idsubrayon',
    'idcabangranting',
    'kategori',
    'subkategori',
    'nama_ibadah',
    'tanggal',
    'waktu',
    'alamat',
    'rtrw',
    'kecamatan',
    'kelurahan',
    'kabkota',
    'provinsi',
    'kodepos',
    'tempat',
    'kordinator',
    'status',
    'usercreated',
    'userupdated'
	];

	 public function cabangranting()
    {
      return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
     public function personal()
    {
      return $this->belongsTo('App\Personal','kordinator','idpersonal');
    }
	public function provinsia()
    {
      return $this->belongsTo('App\Provinces','provinsi','id');
    }
    public function kabkotaa()
    {
      return $this->belongsTo('App\Regencies','kabkota','id');
    }
     public function kecamatana()
    {
      return $this->belongsTo('App\Districts','kecamatan','id');
    }
     public function kelurahana()
    {
      return $this->belongsTo('App\Villages','kelurahan','id');
    }
    public function pelayanibadahraya()
    {
      return $this->hasMany('App\Ibadahrayapelayan','idibadahraya','id');
    }
    public function kehadiranibadahraya()
    {
      return $this->hasMany('App\Ibadahrayakehadiran','idibadahraya','id');
    }
}
