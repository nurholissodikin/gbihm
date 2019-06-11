<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cool extends Model
{
    //
    protected $table = 'cool';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idtipecool',
	'gembala',
	'pengerja',
	'jabatan',
	'lokasi',
	'kabkota',
	'provinsi',
	'kodepos',
	'active',
	'usercreated',
	'userupdated'
    ];

    public function personal()
    {
    	return $this->belongsTo('App\Personal','gembala','idpersonal');
    }
    public function personala()
    {
        return $this->belongsTo('App\Personal','gembala','idpersonal');
    }
    public function tipecool()
    {
    	return $this->belongsTo('App\Tipecool','idtipecool','id');
    }
    public function provinsia()
    {
        return $this->belongsTo('App\Provinces','provinsi','id');
    }
    public function kabkotaa()
    {
        return $this->belongsTo('App\Regencies','kabkota','id');
    }
    public function anggotacool()
    {
        return $this->hasMany('App\Anggotacool','idcool','id');
    }
    public function absensicool()
    {
        return $this->hasMany('App\Absensicool','idcool','id');
    }
    public function user_created()
    {
        return $this->belongsTo('App\User','usercreated','id');
    }
    public function user_updated()
    {
        return $this->belongsTo('App\User','userupdated','id');
    }

}
