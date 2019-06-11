<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanAnggotaCool extends Model
{
    //
    protected $table = 'jabatan_anggota_cool';
    protected $primaryKey = 'id';
    protected $fillable= [
	'kode_jabatan',
	'jabatan_anggota',
	'usercreated',
	'userupdated',
	'active'
    ];
    public function user_created()
    {
        return $this->belongsTo('App\User','usercreated','id');
    }
    public function user_updated()
    {
        return $this->belongsTo('App\User','userupdated','id');
    }
}
