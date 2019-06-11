<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatanpelayanan extends Model
{
    //
    protected $table = 'jabatanpelayan';
    protected $prmaryKey= 'id';
    protected $casts = ['hadirpertemuan' => 'array'];
    protected $fillable =
    [
    	'idpersonal',
    	'tempat',
    	'sejak',
    	'sampai',
    	'pengerja',
    	'noreferensi',
    	'nosertifikat',
    	'hadirpertemuan',
    	'dok',
    	'status',
    	'idpelayanan',
        'tgl',
        'jabatan',
        'idrayon',
        'idsubrayon',
        'idcabangranting',
        'usercreated',
        'userupdated',
        'jenisbadge',
        'jabut'
    ];
    public function personal()
    {
      return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function pelayan()
    {
      return $this->belongsTo('App\Pelayanan','idpelayanan','id');
    }
    public function pengerjaa()
    {
      return $this->belongsTo('App\Personal','pengerja','idpersonal');
    }
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
     public function pmengetahui()
    {
      return $this->belongsTo('App\Ptamukhusus','mengetahui','id');
    }
     public function pemenyetujui()
    {
      return $this->belongsTo('App\Ptamukhusus','menyutujui','id');
    }
    public function Absensi()
    {
        $this->hasMany('App\Jabatanpelayanan','idpertemuan','id');
    }
     public function jeniscool()
    {
      return $this->belongsTo('App\Tipecool','jeniscool','id');
    }
}
