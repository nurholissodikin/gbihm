<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komlkp extends Model
{
    //
    protected $table = 'kk_lkp';
    protected $primaryKey = 'id';
    protected $fillable= [
    'idkelaskom',
	'idmateri',
	'tanggal',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function kelaskom()
    {
    	return $this->belongsTo('App\Kelaskom','idkelaskom','id');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi','idmateri','id');
    }
}
