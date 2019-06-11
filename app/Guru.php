<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
	protected $table = 'guru';
	protected $primaryKey = 'id';
	protected $fillable = [
	'idpersonal',
	'idrayon',
	'usercreated',
	'userupdated',
	'status'
	];

	public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function rayon()
    {
    	return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
    public function komkehadiran()
    {
        return $this->hasMany('App\Komkehadiran','idguru','id');
    }
    public function materiguru()
    {
        return $this->hasMany('App\Materiguru','idguru','id');
    }
}
