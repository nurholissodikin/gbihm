<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komtugas extends Model
{
    //
    protected $table = 'kk_ta';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idkelaskom',
	'idmurid',
	'tugas',
	'usercreated',
	'userupdated',
	'active'
    ]; 

    public function kelaskom()
    {
    	return $this->belongsTo('App\Kelaskom','idkelaskom','idkelaskom');
    }
    public function murid()
    {
        return $this->belongsTo('App\Murid','idmurid','id');
    }
}
