<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiguru extends Model
{
    //
    protected $table = 'kom_materi_guru';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idguru',
	'idmateri',
	'usercreated',
	'userupdated'
    ];

    public function guru()
    {
        return $this->belongsTo('App\Guru','idguru','id');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi','idmateri','id');
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
