<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipecool extends Model
{
    //
    protected $table = 'tipe_cool';
    protected $primaryKey = 'id';
    protected $fillable= [
	'tipecool',
	'usercreated',
	'userupdated',
	'active'
    ];
    public function cool()
    {
        return $this->hasMany('App\Cool','idtipecool','id');
    }
    public function coolpengerja()
    {
        return $this->hasMany('App\Coolpengerja','jenis_cool','id');
    }
    public function pengerja_cool()
    {
        return $this->hasMany('App\Jabatanpelayanan','jeniscool','id');
    }

}
