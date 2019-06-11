<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komseri extends Model
{
    //
    protected $table = 'kom_seri';
    protected $primaryKey = 'id';
    protected $fillable= [
	'kom_seri',
	'status',
	'usercreated',
	'userupdated'
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
