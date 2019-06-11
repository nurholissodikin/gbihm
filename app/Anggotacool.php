<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggotacool extends Model
{
    //
    protected $table = 'anggota_cool';
    protected $primaryKey = 'id';
    protected $fillable = [
    'idpersonal',
	'jabatan_anggota',
	'kategori',
	'idcool',
	'active',
	'usercreated',
	'userupdated'
    ];
     public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function cool()
    {
        return $this->belongsTo('App\Cool','idcool','id');
    }
    public function anggota_create()
    {
        return $this->belongsTo('App\User','usercreated','id');
    }
    public function anggota_update()
    {
        return $this->belongsTo('App\User','userupdated','id');
    }
   
}
