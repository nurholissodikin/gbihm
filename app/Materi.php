<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    //
    protected $table = 'materi';
    protected $primaryKey = 'id';
    protected $fillable= [
	'kode_materi',
	'materi',
	'kom_materi',
	'usercreated',
	'userupdated',
	'active'
    ];

     public function user_created()
    {
        return $this->belongsTo('App\User','usercreated','id');
    }
    public function user_updated()
    {
        return $this->belongsTo('App\User','userupdated','id');
    }
    public function kehadiran()
    {
        return $this->hasMany('App\Komkehadiran','idmateri','id');
    }
    public function lkp()
    {
        return $this->hasMany('App\Komlkp','idmateri','id');
    }
}
