<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komkehadiran extends Model
{
    //
    protected $table = 'kk_kehadiran';
    protected $primaryKey = 'id';
    protected $fillable= [
	
	'idguru',
	'idmateri',
	'tgl',
	'jam',
	'persembahan',
    'idkelaskom',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function rayon()
    {
    	return $this->belongsTo('App\Kelaskom','idkelaskom','id');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi','idmateri','id');
    }
    public function guru()
    {
        return $this->belongsTo('App\Guru','idguru','id');
    }
    public function absensi_kehadiran()
    {
        return $this->hasMany('App\Kehadiranabsensi','idkehadiran','id');
    }
}
