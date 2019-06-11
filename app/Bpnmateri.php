<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnmateri extends Model
{
    //
    protected $table = 'bpn_materi';
    protected $primaryKey = 'id';
    protected $fillable= [
	'kode_materi',
	'modul',
	'materi',
	'kategori',
	'usercreated',
	'userupdated',
	'active'
    ];
    public function kehadiran(){
    	return $this->hasMany('App\Bpnkehadiran','idmateri','id');
    }
}
