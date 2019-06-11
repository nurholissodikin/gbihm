<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diserahkan extends Model
{
    //
    protected $table = 'diserahkan';
    protected $primaryKey = 'iddiserahkan';
    protected $fillable = [
    'idpersonal',
	'idcabangranting',
	'idpelayan',
	'noakta',
	'tanggal',
	'dokumen',
	'usercreated',
	'userupdated',
	'active'
	];
	public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function personala()
    {
    	return $this->belongsTo('App\Personal','idpelayan','idpersonal');
    }
     public function cabang()
    {
    	return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
}
