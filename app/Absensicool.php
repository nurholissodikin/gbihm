<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensicool extends Model
{
    //
     protected $table = 'absensi_cool';
    protected $primaryKey = 'id';
    protected $fillable = [
    'tanggal',
	'idcool',
	'kubu_doa',
	'jemaat',
	'non_jemaat',
	'persembahan',
	'gembala',
	'lokasi',
	'jeniscool',
	'active',
	'usercreated',
	'userupdated'

    ];
    public function cool()
    {
        return $this->belongsTo('App\Cool','idcool','id');
    }
}
