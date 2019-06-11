<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
    'idrayon',
    'idsubrayon',
    'idcabangranting',
    'kategori',
    'subkategori',
    'nama_kegiatan',
    'kategori_peserta',
    'tgl_mulai',
    'tgl_selesai',
    'alamat',
    'rtrw',
    'kecamatan',
    'kelurahan',
    'kabkota',
    'provinsi',
    'kodepos',
    'tempat',
    'kordinator',
    'dokumen',
    'status',
    'usercreated',
    'userupdated',
    'waktu_mulai'
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
    public function pelayankegiatan()
    {
      return $this->hasMany('App\Pelayankegiatan','idkegiatan','id');
    }
    public function pesertakegiatan()
    {
      return $this->hasMany('App\Pesertakegiatan','idkegiatan','id');
    }
    public function kehadirankegiatan()
    {
      return $this->hasMany('App\Kegiatankehadiran','idkegiatan','id');
    }

}
