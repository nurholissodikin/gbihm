<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptisrohkudus extends Model
{
    //
    protected $table= 'baptis_roh_kudus';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idpersonal',
	'baptisrohkudus',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
