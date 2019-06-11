<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    //
    protected $table = 'profesi';
    protected $primaryKey = 'idprofesi';
    protected $fillable= [
	'profesi',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function personal()
    {
    	return $this->hasMany('App\Personal','idprofesi','idprofesi');
    }
}
