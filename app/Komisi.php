<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    //
    protected $table ='komisi';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idrayon',
	'idsubrayon',
	'idcabangranting',
	'usercreated',
	'userupdated',
	'idpersonal',
	'komisi',
	'jadwal'
    ];

    public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
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
}
