<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidangpekerjaan extends Model
{
    //
     protected $table = 'bidang_pekerjaan';
    protected $primaryKey = 'idbidangpekerjaan';

    protected $fillable= [
	'bidangpekerjaan',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function personal()
    {
    	return $this->hasMany('App\Personal','idbidangpekerjaan','idbidangpekerjaan');
    }
}
