<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    //
     protected $table = 'pertemuan';
    protected $primaryKey = 'id';
    protected $fillable= [
	'kode',
	'tanggal',
	'nama',
	'tempat',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function Absensi()
    {
    	$this->hasMany('App\Absensipertemuan','idpertemuan','id');
    }
}
